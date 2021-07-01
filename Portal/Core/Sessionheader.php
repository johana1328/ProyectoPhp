<?php
session_start();
if (!isset($_SESSION['nombres'])) {
    header('Location: login.php');
}

