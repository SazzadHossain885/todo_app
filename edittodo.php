<?php
session_start();
include('./database/env.php');
$id = intval($_REQUEST['id']);
$query = "SELECT * FROM todo WHERE id = '$id'";
$res = mysqli_query($connection, $query);
$post = mysqli_fetch_assoc($res);

if (!$post) {
  header('Location: 404.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Edit Todo</title>
  <style>
    .message {
      text-align: center;
      color: #198754;
      font-size: 1rem;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="col-lg-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="#">Edit Todo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./todoall.php">All Todo</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <form method="POST" action="./controller/todoupdate.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
            <input value="<?= htmlspecialchars($post['title']) ?>" type="text" class="form-control my-3" name="title" placeholder="Edit Todo Title">
            <textarea name="detail" class="form-control my-3" placeholder="Edit Todo Detail"><?= htmlspecialchars($post['details']) ?></textarea>
            <button class="btn btn-primary rounded-0">Update Todo</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>