<?
//ini buat input love
$id_produk = $_GET['id_produk'];

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
  VALUES($id_produk)
  ";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Insert successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


//buat cookie logic
if(isset($_COOKIE['cookie'])){
	$data = unserialize($_COOKIE['cookie'], ["allowed_classes" => false]);
}
else{
	$data = array();
}

//push id_produk
array_push($data,$id_produk);
$data = array_unique($data); //filter array

setcookie('cookie', serialize($data), time()+360000 * 100);



header('Location: index.php?id_produk='.$id_produk);
?>