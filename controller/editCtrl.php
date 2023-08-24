<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $pwd = $_POST['pwd'];
    $pwdConfirm = $_POST['pwdConfirm'];
    $edit_id = ($_POST['edit_id']);

    try
    {

        require_once "../controller/userCtrl.php";

        $editUserData = $_SESSION['editUserData'];

        $editValidation = new UserCtrl($name, $email, $telephone, $pwd, $pwdConfirm);

        $errors = $editValidation->EditErrorHandling();


        if(!empty($errors))
        {
            $_SESSION['register_error'] = $errors;
            header('Location: ../view/editView.php?edit_id='.$edit_id);
            exit();
        }
       
        $editValidation->editUser($name, $email, $telephone, $pwd, $edit_id);

        header("Location: ../view/index.php?edit=success");
    }
    catch(PDOException $e)
    {
        echo "Failed (editCtrl.php): " . $e->getMessage();
    }
}
else
{
    header("Location ../view/index.php");
    die();
}
