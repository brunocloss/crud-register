<?php

require_once "database/database.php";

class UserModel extends Database
{

    ////////////////////////////////////////////
    //functions that interact with the database:
    protected function queryDisplayUsers()
    {
        $sql = "SELECT * FROM users ORDER BY id";
        $stmt = $this->dbConnect()->query($sql);
        
        $res = $stmt->fetchAll();

        foreach ($res as $row) 
        {
            echo "<tr>";
            
            foreach ($row as $key => $value)
             {
                if ($key !== "id")
                {
                    echo "<td>".$value."</td>";
                }
            }

            ?>
            <td>
                <a href="../view/editView.php?edit_id=<?= $row['id']?>" style="color: white; text-decoration:none">🔄EDIT</a>    
                <a href="../controller/deleteCtrl.php?delete_id=<?= $row['id']?>" style="color: white; text-decoration:none">❌DELETE</a>
            </td>
            
            <?php
            echo "</tr>";
        }
    }

    protected function querySetUser($username, $email, $telephone, $pwd)
    {
        $sql = "INSERT INTO users (`name`,`email`,`telephone`,`pwd`) VALUES (:u,:e,:t,:p)";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->bindParam(":u", $username);
        $stmt->bindParam(":e", $email);
        $stmt->bindParam(":t", $telephone);
        $stmt->bindParam(":p", $pwd);
        $stmt->execute();
    }

    protected function queryGetEmail($email)
    {
        $res = [];
        $sql = "SELECT `name` FROM users WHERE email = :e";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->bindValue(':e', $email);
        $stmt->execute();
        
        $res = $stmt->fetch(PDO::FETCH_ASSOC);   
        return $res;
    }

    protected function queryGetUser($id)
    {
        $res = [];
        $sql = "SELECT * FROM users WHERE id=:i";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->bindParam(":i", $id);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    protected function queryEdit($name, $email, $telephone, $pwd, $id)
    {
        $sql = "UPDATE users SET `name`=:n,`email`=:e,`telephone`=:t, `pwd`=:p WHERE id=:i";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->bindParam(":n", $name);
        $stmt->bindParam(":e", $email);
        $stmt->bindParam(":t", $telephone);
        $stmt->bindParam(":p", $pwd);
        $stmt->bindParam(":i", $id);
        $stmt->execute();
    }

    protected function queryDelete($id)
    {
        $sql = "DELETE FROM users WHERE id=:i";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->bindParam(":i", $id);
        $stmt->execute();
    }

}
