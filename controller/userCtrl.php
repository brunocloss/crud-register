<?php
require_once __DIR__ . '/../model/userModel.php';

class UserCtrl extends UserModel
{

    private $name;
    private $email;
    private $telephone;
    private $pwd;
    private $pwdConfirm;

    public function __construct($name, $email, $telephone, $pwd, $pwdConfirm)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->pwd = $pwd;
        $this->pwdConfirm = $pwdConfirm;
    }

    ///////////////////////////////////////////////////////////
    //basic validations to see if exist error(s) on user input:

    private function emptyInput()
    {
        if(empty($this->name) || empty($this->email) || empty($this->telephone) || empty($this->pwd) || empty($this->pwdConfirm))
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    private function emailValidation()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)  || $this->queryGetEmail($this->email))
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    private function pwdValidation()
    {
        if($this->pwd !== $this->pwdConfirm)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    ////////////////////////////////////////////////////////////////////////////////
    //errors are going to be displayed on user screen in case of an error detection:

        public function registerErrorHandling()
    {
        $errors = [];

        if($this->emptyInput())
        {
            $errors['empty_error'] = "Fill all fields";
        }
        if($this->emailValidation())
        {
            $errors['email_error'] = "Invalid email or already taken";
        }
        if($this->pwdValidation())
        {
            $errors['password_error'] = "The passwords are different";
        }

        return $errors;
    }

    public function EditErrorHandling()
    {
        $errors = [];

        if($this->emptyInput())
        {
            $errors['empty_error'] = "Fill all fields";
        }
        if($this->pwdValidation())
        {
            $errors['password_error'] = "The passwords are different";
        }

        return $errors;
    }

    public function errorDisplay()
    {
        if(isset($_SESSION['register_error']))
        {
            $errors = $_SESSION['register_error'];

            echo '<br>';
            foreach ($errors as $error)
            {
                echo '<p style="color:red">' . $error . '</p>';
            }

            unset($_SESSION['register_error']);
        }
        else if(isset($_GET['register']) && $_GET['register'] === "success")
        {
            echo '<br>';
            echo '<p style="color:green;">Register success</p>';
        }
        else if(isset($_GET['edit']) && $_GET['edit'] === "success")
        {
            echo '<br>';
            echo '<p style="color:green;">Edit success</p>';
        }
        else if(isset($_GET['delete']) && $_GET['delete'] === "success")
        {
            echo '<br>';
            echo '<p style="color:green;">Delete success</p>';
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    //taking methods from Model and implement them on methods inside Controller:

    public function displayUsers()
    {
        $this->queryDisplayUsers();
    }

    public function getUser($id)
    {
        return $this->queryGetUser($id);
    }

    public function editUser($name, $email, $telephone, $pwd, $id)
    {
        $this->queryEdit($name, $email, $telephone, $pwd, $id);
    }

    public function deleteUser($id)
    {
        $this->queryDelete($id);
    }

    public function registerUser($username, $email, $telephone, $pwd)
    {
        $this->querySetUser($username, $email, $telephone, $pwd);
    }
    
}
