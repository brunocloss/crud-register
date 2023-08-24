<?php
require_once "../controller/userCtrl.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="background-color: #0d0f10;">

    <div class="container mt-5 text-center">
        <form action="registerView.php" method="post">
            <input type="submit" class="btn btn-dark" name="submit" value="REGISTER NEW USER">
        </form>
    </div>
    <div class="container mt-5 tex-center">

        <table class="table table-dark table-hover rounded">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>TELEPHONE</th>
                    <th>PASSWORD</th>
                    <th colspan="2">REGISTRATION DATE</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $user = new UserCtrl("name", "email", "telephone", "pwd", "pwdConfirm");
                $user->displayUsers();


                ?>

            </tbody>
        </table>
        <div class="text-center">
            <?php
            $user->errorDisplay();
            ?>
        </div>
    </div>


</body>

</html>