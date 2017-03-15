<?php

require_once 'app.php';

$townService = new \Service\Town\TownService($db);

$allTowns = $townService->load();



