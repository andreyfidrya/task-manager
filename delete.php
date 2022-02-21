<?php 

if($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id_del'])){
    //tt($_GET);
    $id = $_GET['id_del'];
    delete('tasks', $id);
    header('Location: index.php');
    }

?>