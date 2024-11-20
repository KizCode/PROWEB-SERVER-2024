<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["berkas"]["name"]);

move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file);