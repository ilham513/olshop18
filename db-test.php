<<<<<<< HEAD
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
=======
<?
$db = parse_url(getenv("DATABASE_URL"));
$db["path"] = ltrim($db["path"], "/");

// konfigurasi koneksi
$host       =  $db["host"];
$dbuser     =  $db["user"];
$dbpass     =  $db["pass"];
$port       =  $db["port"];
$dbname    =  $db["path"];

try {
  $conn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass); 
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql INSERT
  $sql = "
  INSERT INTO love (id)
  VALUES(1)
  ";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Insert successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
>>>>>>> 91b608a011f637155705d48282440be4f92a8121
