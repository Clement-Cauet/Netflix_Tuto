<?php

require_once '../config/session.php';

// Détruire la session
session_destroy();

// Rediriger vers login.php
header('Location: login.php');

?>