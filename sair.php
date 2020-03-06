<?php
    session_start();
    if (isset($_SESSION['logado']) && !empty($_SESSION['logado']))
    {
        session_destroy();
        header("Location: login.php");
    }
    else
    {
        header("Location: login.php");
    }
