<?php

if (!defined('HOSTNAME')) {
  define('HOSTNAME', 'localhost');
}
if (!defined('USERNAME')) {
  define('USERNAME', 'root');
}
if (!defined('PASSWORD')) {
  define('PASSWORD', '');
}
if (!defined('DATABASENAME')) {
  define('DATABASENAME', 'todo_work');
}

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASENAME);

if (!$connection) {
  echo "Connection Failed";
}
