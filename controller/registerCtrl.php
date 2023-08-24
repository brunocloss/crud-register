<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $pwd = $_POST['pwd'];
    $pwdConfirm = $_POST['pwdConfirm'];

    try
    {
        require_once "../controller/userCtrl.php";
        
        $registerValidation = new UserCtrl($name, $email, $telephone, $pwd, $pwdConfirm);

        $errors = $registerValidation->registerErrorHandling();

        session_start();

        if(!empty($errors))
        {
            $_SESSION['register_error'] = $errors;
            header('Location: ../view/registerView.php');
            exit();
        }

        $registerValidation->registerUser($name, $email, $telephone, $pwd);

        header("Location: ../view/index.php?register=success");
    }
    catch(PDOException $e)
    {
        echo "Failed (register.php): " . $e->getMessage();
    }
}
else
{
    header("Location ../view/index.php");
    die();
}
