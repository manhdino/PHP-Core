<?php
session_start();
session_destroy();
header('Location: ./11_Session.php');
