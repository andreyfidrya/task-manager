<?php

require('database/connect.php');
require('database/db.php');

/*if(!empty($_POST['clientname'])){
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
}*/

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="my2.css">
    <title>Task Manager</title>
</head>
<body>
<h1>Add a New Task</h1>

<form action="add.php" method="post">
  <div class="mb-3">
    <label>Client Name</label>
    <input type="text" class="form-control" name="clientname">
  </div>
  <div class="mb-3">
    <label>Task</label>
    <input type="text" class="form-control" name="task">
  </div>
  <div class="mb-3">
    <label>Budget</label>
    <input type="text" class="form-control" name="budget">
  </div>
  <div class="mb-3">
    <label>Performance</label>
    <textarea class="form-control" name="performance"></textarea>
  </div>
  <div class="mb-3">
    <label>Due date</label>
    <input type="text" class="form-control" name="duedate">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
<b><a href="http://localhost/task-manager/">Go back to HomePage</a></b>
</body>
</html>

<?php
if(!empty($_POST['clientname']))
{
  $clientname = $_POST['clientname'];
  $task = $_POST['task'];
  $budget = $_POST['budget'];
  $performance = $_POST['performance'];
  $duedate = $_POST['duedate'];
  
  $newtask = [
    'clientname' => $clientname,
    'task' => $task,
    'budget' => $budget,
    'performance' => $performance,
    'duedate' => $duedate     
  ];
  
  insert('tasks', $newtask);
  header('Location: index.php');
}
?>



