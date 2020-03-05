<?php
    session_start();
    if (isset($_SESSION['logado']) && !empty($_SESSION['logado']))
    {
        session_destroy();
        header("Location: login.html");
    }
    else
    {
        header("Location: login.html");
    }
