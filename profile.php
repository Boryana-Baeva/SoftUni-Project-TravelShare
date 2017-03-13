<?php

require_once 'app.php';

$app->checkLogin();

echo "Здравей, " . $_SESSION['username'];