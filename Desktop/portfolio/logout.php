<?php
  session_start();

  //deletes all variables created during saving computer
  //loginid <<--delete computer
    session_destroy();
    //header() <== automatic transfer to a diffrent website
    header("Location: login.php");

    ?>