　　　<?php
require_once 'classes/User.php';

//create object
$user = new User;

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $user->login($email, $pass);

} else if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    // echo "register";
    $user->insertIntoUser($name, $address, $number, $email, $pass);

} else if (isset($_POST["author"])) {
    $name = $_POST["name"];

    $user->addAuthor($name);

} else if (isset($_POST["book"])) {
    $bookname = $_POST["bname"];
    $yearpublished = $_POST["ypublished"];
    $Author = $_POST["Author"];

    $user->addBook($bookname, $yearpublished, $Author);
}else if(isset($_POST["updateuser"])){
    
}else if(isset($_POST["updatebook"])){
    $name = $_POST["name"];
    $year = $_POST["year"];
    $bookid = $_POST["bookid"];
    $user->updateBook($name,$year,$bookid);

} else if ($_GET['actiontype'] == 'deleteUser') {
    $id = $_GET['id'];
    $user->deleteUser($id);
    
}else if ($_GET['actiontype'] == 'deleteBook') {
    $id = $_GET['id'];
    $user->deleteBook($id);
}

?>