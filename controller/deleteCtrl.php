<?php

require_once __DIR__ . '/../controller/userCtrl.php';


$deleter = new UserCtrl($name, $email, $telephone, $pwd, $pwdConfirm);

if(isset($_GET['delete_id']))
{
    $delete_id = ($_GET['delete_id']);
    $deleter->deleteUser($delete_id);
    header("Location: ../view/index.php?delete=success");
}
