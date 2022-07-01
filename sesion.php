<?php
        session_start();
        unset($_SESSION["login"]);
        session_destroy($_SESSION["login"]);
        header("location:index.php");
?>