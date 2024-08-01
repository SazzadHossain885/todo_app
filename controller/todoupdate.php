<?php
session_start();

$title = $_REQUEST['title'];
$details = $_REQUEST['detail'];
$id = $_REQUEST['id'];
$errors = [];

// Validation
if (empty($title)) {
  $errors['title_error'] = "Title is required";
}

if (empty($details)) {
  $errors['detail_error'] = "Details are required";
}

if (count($errors) > 0) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_data'] = $_REQUEST;
  header("Location: ../edittodo.php?id=$id");
} else {
  include('../Database/env.php');
  $query = "UPDATE todo SET title = '$title', details = '$details' WHERE id = '$id'";
  $res = mysqli_query($connection, $query);

  if ($res) {
    header('Location: ../todoall.php');
  } else {
    echo "Error updating record: " . mysqli_error($connection);
  }
}
