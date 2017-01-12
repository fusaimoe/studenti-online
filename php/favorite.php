<?php

include 'db_connect.php';
include 'functions.php';


$name = urldecode($_GET['name']);
$student = $_GET['student'];
$add = $_GET['add'];


$sql = "UPDATE student_categories
        SET favorite =  '" . $add ."' 
        WHERE category_name = '" . $name ."' AND student_id = '" . $student ."' ";



if($mysqli->query($sql)){

  header('Location: ../index.php?settings=true');

}

?>
