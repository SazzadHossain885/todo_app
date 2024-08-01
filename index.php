<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Todo</title>
</head>

<body>
  <div class="container mt-5">
    <div class="col-lg-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <ul class="nav ">
            <li class="nav-item">
              <a class="nav-link active text-danger" aria-current="page" href="#">Add Todo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./todoall.php">All Todo</a>
            </li>
          </ul>
        </div>
        <div class="card-body">

          <form method="POST" action="./controller/storetodo.php">
            <input value="<?= htmlspecialchars($_SESSION['old_data']['title'] ?? '') ?>" type="text" class="form-control my-3" name="title" placeholder="Todo Title">
            <p class="text-danger"><?= $_SESSION['errors']['title_error'] ?? '' ?></p>
            <textarea name="detail" class="form-control my-3" placeholder="Todo Detail"><?= htmlspecialchars($_SESSION['old_data']['detail'] ?? '') ?></textarea>
            <p class="text-danger"><?= $_SESSION['errors']['detail_error'] ?? '' ?></p>
            <button class="btn btn-primary rounded-0">Add Todo</button>
          </form>
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