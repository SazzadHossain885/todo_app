<?php
session_start();

$title = $_REQUEST['title'];
$details = $_REQUEST['detail'];
$errors = [];

if (empty($title)) {
  $errors['title_error'] = "Titles Is Required";
}


if (empty($details)) {
  $errors['detail_error'] = "Details Is Required";
}

if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old data'] = $_REQUEST;
  header('Location: ../index.php');
} else {
  include('../database/env.php');
  $Query = "INSERT INTO todo  (title , details) VALUES ('$title','$details')";

  $storeData = mysqli_query($connection, $Query);

  if ($storeData) {
    header('Location: ../index.php?dataAdd_msg=Data Add successfull');
  }
}
