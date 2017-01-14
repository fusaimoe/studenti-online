<?php

include 'db_connect.php';
include 'functions.php';

$name = urldecode($_POST['name']);
$student = $_POST['student'];
$add = $_POST['add'];


$sql = "UPDATE student_categories
        SET favorite =  '" . $add ."'
        WHERE category_name = '" . $name ."' AND student_id = '" . $student ."' ";

$mysqli->query($sql);

?>
