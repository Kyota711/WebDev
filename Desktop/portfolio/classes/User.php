<?php
session_start();

require_once 'Database.php';

class User extends Database
{
    public function insertIntoUser($name, $address, $number, $email, $pass)
    {
        $sql = "INSERT INTO login(email,password) VALUES ('$email','$pass')";

        if ($this->conn->query($sql) == true) {
            $loginid = mysqli_insert_id($this->conn);
            $sql2 = "INSERT INTO user(name,address,number,loginid)
                    VALUES('$name','$address','$number',$loginid)";
            if ($this->conn->query($sql2)) {
                header("Location: login.php");
            } else {
                echo "Error in inserting to USER TABLE." . $this->conn->error;

            }
        } else {
            echo "Error in inserting to LOGIN TABLE." . $this->conn->error;
        }
    }
    public function addAuthor($authorname)
    {
        $sql = "INSERT INTO author(authorname) VALUES ('$authorname')";

        if ($this->conn->query($sql) == true) {
            header("Location:viewAuthors.php");
        } else {
            echo "Error in inserting to AUTHOR TABLE." . $this->conn->error;
        }
    }
    public function displayAllAuthors()
    {
        $sql = "SELECT * FROM author";
        $result = $this->conn->query($sql);
        $rowsArray = array();

        while ($row = $result->fetch_assoc()) {
            $rowsArray[] = $row;
        }

        return $rowsArray;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user INNER JOIN login ON user.loginid = login.loginid";
        $result = $this->conn->query($sql);

        $rowsArray = array();

        while ($row = $result->fetch_assoc()) {
            $rowsArray[] = $row;
        }
        return $rowsArray;
    }

    public function login($email, $pass)
    {
        $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$pass'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION["loginid"] = $row["loginid"];

            if ($row["status"] == 'A') {
                header("Location: admin.php");
            } else {
                header("Location: user.php");
            }

        } else {
            echo "Error in email and password." . $this->conn->error;
        }

    }
    public function addBook($bookname, $yearpublished, $authorid)
    {
        $sql = "INSERT INTO books(bookname,yearpublished,authorid) VALUES ('$bookname','$yearpublished','$authorid')";
        if ($this->conn->query($sql) == true) {
            header("Location:admin.php");
        } else {
            echo "Error in inserting to BOOKS TABLE." . $this->conn->error;
        }
    }

    public function displayAllBooks()
    {
        $sql = "SELECT * FROM books INNER JOIN author ON books.authorid = author.authorid";
        $result = $this->conn->query($sql);
        $rowsArray = array();

        while ($row = $result->fetch_assoc()) {
            $rowsArray[] = $row;
        }

        return $rowsArray;

    }
    public function deleteUser($loginid)
    {
        $sql = "DELETE user, login FROM user INNER JOIN login ON user.loginid =
              login.loginid WHERE user.loginid='$loginid'";

        if ($this->conn->query($sql)) {
            header("Location:viewUsers.php");
        } else {
            echo "Error in deleting." . $this->conn->error;
        }

    }
    public function deleteBook($loginid)
    {
        $sql = "DELETE FROM books WHERE bookid='$loginid'";

        if ($this->conn->query($sql)) {
            header("Location:viewBooks.php");
        } else {
            echo "Error in deleting." . $this->conn->error;
        }
    }

    public function getSpecificUser($id)
    {
        $sql = "SELECT * FROM user INNER JOIN login ON user.loginid = login.loginid WHERE
        user.loginid = '$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        return $row;

    }
    public function updateUser($name, $address, $number, $password, $loginid)
    {
        $sql = "UPDATE user INNER JOIN login ON user.loginid = login.loginid
             SET login.password = '$pass',
             user.name = '$name',
             user.address = '$address',
             user.number = '$number'
             WHERE user.loginid = '$loginid'";

        if ($this->conn->query($sql)) {
            header("Location: viewUsers.php");
        } else {
            echo "Error in updating the record." . $this->conn->error;
        }
    }
    public function updateBook($name,$year,$bookid)
    {
        $sql = "UPDATE books SET
        bookname = '$name',
        yearpublished = '$year'
        WHERE bookid = '$bookid'";
        
        if ($this->conn->query($sql)) {
            header("Location: viewBooks.php");
        } else {
            echo "Error in updating the record." . $this->conn->error;
        }
    }
    
    public function getSpecificbook($bookid){
        $sql = "SELECT * FROM books WHERE bookid = '$bookid'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
}

// 
