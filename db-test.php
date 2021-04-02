<?php
$db = parse_url(getenv("postgres://eizcjebjpfpcit:03fe251d1c9bda2cdbb6b39833de6508d8c75ec6cc18b3f2e4bab39214c5e14b@ec2-23-21-229-200.compute-1.amazonaws.com:5432/dbs95ig0jfd9t9"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));


var_dump($pdo);