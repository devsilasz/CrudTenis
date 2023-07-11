<?php
include_once '../Controller/ControllerUser.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $userController = new ControllerUser();
    $userController->deleteUser($id);
}
?>