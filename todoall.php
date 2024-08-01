<?php
session_start();
include('./Database/env.php');

$query = "SELECT * FROM todo ORDER BY id DESC";
$res = mysqli_query($connection, $query);
$posts = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>All Todos</title>
</head>
<style>
  .btn-edit {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
  }

  .btn-delete {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
  }
</style>

<body>
  <div class="container mt-5">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <ul class="nav ">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">Add Todo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-danger" href="#">All Todo</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Edit </th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($posts as $key => $post) : ?>
                <tr>
                  <td><?= ++$key ?></td>
                  <td><?= ($post['title'] ?: '---') ?></td>
                  <td><?= (strlen($post['details']) > 10 ? substr($post['details'], 0, 10) . '...' : $post['details']) ?></td>
                  <td>
                    <a href="./edittodo.php?id=<?= $post['id'] ?>" class="btn btn-edit btn-sm">Edit</a>
                  </td>
                  <td>
                    <a href="./controller/deletetodo.php?id=<?= $post['id'] ?>" class="btn btn-delete btn-sm">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
session_unset();
?>