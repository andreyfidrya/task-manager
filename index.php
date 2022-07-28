<?php

require('database/connect.php');
require('database/db.php');


$statement = $pdo->prepare('SELECT * FROM tasks ORDER BY id ASC');
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
/*echo '<pre>';
print_r($tasks);
echo '</pre>';*/
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
    <h1>Task Manager</h1>

    <p>
    <a href="add.php" class="btn btn-success">Add a Task</a>
    </p>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Client Name</th>
      <th scope="col">Task</th>
      <th scope="col">Budget</th>
      <th scope="col">Performance</th>
      <th scope="col">Due date</th>
      <th scope="col">Author</th>
      <th scope="col">Action</th>       
    </tr>
  </thead>
  <tbody>
    <?php foreach($tasks as $t): ?>
      <tr>
      <td><?php echo $t['clientname'];?></td>
      <td><?php echo $t['task'];?></td>
      <td><?php echo $t['budget'];?></td>
      <td><?php echo $t['performance'];?></td>
      <td><?php echo $t['duedate'];?></td> 
      <td><?php echo $t['author'];?></td>
      <td>
      <a href="edit.php?id=<?=$t['id'];?>" class="btn btn-sm btn-primary">Edit</a>
      <a href="edit.php?id_del=<?=$t['id'];?>" class="btn btn-sm btn-danger">Delete</a>
      </td>     
      </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
  </body>
</html>


