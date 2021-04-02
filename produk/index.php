<?php  

$id_produk = $_GET['id_produk'];

$json = file_get_contents('../data.json');
$posting_raw = json_decode($json, true);

// echo '<pre>';var_dump($posting_raw['produk']["$id_produk"]);die();

$produk = $posting_raw['produk']["$id_produk"];



//ambil love
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return parent::current();
    }
}
  
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
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("
    SELECT
        COUNT (id)
    FROM
        love
	WHERE
		id = '$id_produk'
    GROUP BY
        id;

    ");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        $love_count = $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Beli <? echo ucwords($produk['nama_produk']) ?></title>

  <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Olshop18</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cek Transaksi</a>
          </li>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Beli <? echo ucwords($produk['nama_produk']) ?></h1>
	  </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Rincian Produk
          </div>
          <div class="card-body">
			  <img class="card-img-top img-fluid" src="<? echo $produk['gambar_produk'] ?>" alt="" wid>
			  <div class="card-body">
				<div class="row">
				  <div class="col-8"><h3 class="card-title"><? echo ucwords($produk['nama_produk']) ?></h3></div>
				  <div class="col-4" style="text-align: right;color: red;"><a style="color:red" href="love.php?id_produk=<? echo $id_produk ?>"><h4><i class="fa fa-heart-o"></i>  <? echo $love_count ?> </h4></a></div>
				  <!-- fa fa-heart (on) -->
				</div>
				<h4 style="color:green">RP <? echo number_format($produk['harga_produk']) ?> 
				<? echo $produk['harga_produk'] == 0 ? '(Gratis)' : '(PREMIUM)' ?></h4><br/>
				<p class="card-text jumbotron">
				<? echo $produk['deskripsi_produk'] ?>
				</p>				
				<hr>
				<a href="checkout?id_produk=<? echo $id_produk ?>" class="btn  	btn-success btn-block">Beli Sekarang</a>
          </div>
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; HerokuApp - 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="include/jquery/jquery.min.js"></script>
  <script src="include/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
