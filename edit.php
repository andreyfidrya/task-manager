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
<h1>Edit a Task</h1>

<?php
  if($_SERVER['REQUEST_METHOD'] ==='GET'){
    $id = $_GET['id'];
    $edittask = selectOne('tasks', ['id' => $id]);
   
    $id = $edittask['id'];
    $clientname = $edittask['clientname'];
    $task = $edittask['task'];
    $budget = $edittask['budget'];
    $performance = $edittask['performance'];
    $duedate = $edittask['duedate'];
  }
?>

<form action="" method="post">
    <input name="id" value="<?=$id;?>" type="hidden">
  <div class="mb-3">
    <label>Client Name</label>
    <input type="text" value="<?=$clientname;?>" class="form-control" name="clientname">
  </div>
  <div class="mb-3">
    <label>Task</label>
    <input type="text" value="<?=$task;?>" class="form-control" name="task">
  </div>
  <div class="mb-3">
    <label>Budget</label>
    <input type="text" value="<?=$budget;?>" class="form-control" name="budget">
  </div>
  <div class="mb-3">
    <label>Performance</label>
    <textarea class="form-control" name="performance"><?=$performance;?></textarea>
  </div>
  <div class="mb-3">
    <label>Due date</label>
    <input type="text" value="<?=$duedate;?>" class="form-control" name="duedate">
  </div>
  
  <button name="task-update" type="submit" class="btn btn-primary">Update a Task</button>

</form>
<b><a href="http://localhost/task-manager/">Go back to HomePage</a></b>
</body>
</html>

<?php 
require('delete.php');
?>

<?php
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['task-update'])){

//tt($_POST);
    $id = $_POST['id'];
    $clientname = $_POST['clientname'];
    $task = $_POST['task'];
    $budget = $_POST['budget'];
    $performance = $_POST['performance'];
    $duedate = $_POST['duedate'];

    $updatetask = [
      'clientname' => $clientname,
      'task' => $task,
      'budget' => $budget, 
      'performance' => $performance,
      'duedate' => $duedate               
  ];

  update('tasks', $id, $updatetask);
  header('Location: index.php');
  
}
?>





