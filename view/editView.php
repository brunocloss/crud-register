<?php

require_once __DIR__ . '/../controller/userCtrl.php';

session_start();
$editUserData = [];

if(isset($_GET['edit_id']))
{
    $edit_id = $_GET['edit_id'];
    $userCtrl = new UserCtrl("name", "email", "telephone", "pwd", "pwdConfirm");
    $editUserData = $userCtrl->getUser($edit_id);

    $_SESSION['editUserData'] = $editUserData;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body style="background-color: #0d0f10; color: #ffffff;">

    <div class="container mt-5 col-sm-4">
        <form action="../controller/editCtrl.php" method="post">
            <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
            <h2 class="text-center">EDIT USER:</h2>

            <div class="mb-3 mt-5">
                <div class="input-group mb-3">
                    <span class="input-group-text">👤</span>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" maxlength="30" value="<?= $editUserData['name'] ?>">

                </div>
            </div>
            <div class="mb-3 mt-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input type="email" class="form-control" placeholder="E-mail" name="email" maxlength="30" value="<?= $editUserData['email'] ?>">
                </div>
            </div>
            <div class="mb-3 mt-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">🕿</span>
                    <input type="tel" class="form-control" placeholder="Enter telephone" name="telephone" maxlength="15" value="<?= $editUserData['telephone'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">🔒</span>
                    <input type="password" class="form-control" placeholder="Enter password" name="pwd" maxlength="30" value="<?= $editUserData['pwd'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text">🔒</span>
                    <input type="password" class="form-control" placeholder="Confirm password" name="pwdConfirm" maxlength="30">
                </div>
            </div>
            <div class="container mt-5 text-center">
                <form action="view/registerView.php" method="post">
                    <input type="submit" class="btn btn-dark" name="submit" value="EDIT">
                </form>
            </div>
            <div class="container mt-2 text-center">
                <form action="../view/index.php" method="post">
                    <input type="submit" class="btn btn-dark" name="submit" value="BACK">
                </form>

                <?php
                $user = new UserCtrl("name", "email", "telephone", "pwd", "pwdConfirm");
                $user->errorDisplay();
                ?>

            </div>
        </form>
    </div>

</body>

</html>