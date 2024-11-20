<?php
include 'koneksi.php';

// Create user table
$sql = "CREATE TABLE user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL
)";

// Create produk table
$sql2 = "CREATE TABLE IF NOT EXISTS produk (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) UNIQUE,
    harga INT(11),  
    stok INT(11)    
    
)";

// Execute the SQL queries to create the tables
if (mysqli_query($conn, $sql)) {
    echo "Table user created successfully<br>";
} else {
    echo "Error creating user table: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $sql2)) {
    echo "Table produk created successfully<br>";  // Corrected table name
} else {
    echo "Error creating produk table: " . mysqli_error($conn) . "<br>";
}

// Insert sample data into user table
$insert_user = "INSERT INTO user (username, password,) VALUES 
    ('admin', 'admin123', 'admin'),
    ('user1', 'password1', 'user'),
    ('user2', 'password2', 'user')";

if (mysqli_query($conn, $insert_user)) {
    echo "Sample data inserted into user table successfully<br>";
} else {
    echo "Error inserting data into user table: " . mysqli_error($conn) . "<br>";
}

// Insert sample data into produk table
$insert_produk = "INSERT INTO produk (nama_produk, harga, stok) VALUES 
    ('Laptop', 5000.00, 10),
    ('Smartphone', 3000.00, 20),
    ('Headphones', 150.50, 50)";

if (mysqli_query($conn, $insert_produk)) {
    echo "Sample data inserted into produk table successfully<br>";
} else {
    echo "Error inserting data into produk table: " . mysqli_error($conn) . "<br>";
}

// Close the database connection
mysqli_close($conn);
?>
