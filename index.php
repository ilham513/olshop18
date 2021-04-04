<?php  

$json = file_get_contents('data.json');
$posting_raw = json_decode($json, true);

//algoritma p array
//inisiasi p
if(isset($_GET['p'])){
	$p = $_GET['p'];
}else{
	$p = 0;
}

$raw_item_total = count($posting_raw["produk"]);

$p_total = $raw_item_total / 6;
// echo floor($p_total);die();

$mulai = $p * 6;
$puncak = $mulai + 6;

for ($a = $mulai; $a < $puncak; $a++) {
	if ($posting_raw["produk"][$a] == null){continue;} //jika kosong-> longkap
	$posting_raw["produk"][$a]['id_produk'] = $a;
	$posting[$a] = $posting_raw["produk"][$a];
}

// echo "<pre>"; var_dump($posting);die();



//algoritma dinamik-grid
$x = 1;
$z = 1;
$total_items = count($posting);

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Olshop18</title>

  <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Olshop18</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
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

        <h1 class="my-4">Toko Online 18+ Terlengkap di Indonesia!</h1>
		
		<!-- DISABLE MENU
        <div class="list-group">
          <a href="#" class="list-group-item">Ilustrasi</a>
          <a href="#" class="list-group-item">Video</a>
          <a href="#" class="list-group-item">Majalah</a>
        </div>
		-->

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          </ol>
          <div class="carousel-inner" role="listbox 900x350">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://dummyimage.com/900x400/000/FF0000&text=OLSHOP18" alt="First slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
		
		<?
		foreach ($posting as $i=>$posting) { 
			$x = ($x > 3) ? 1 : $x; //kalau udah lebih 3 -> jadiin 1
			echo ($x == 1) ? "<div class='row'>" : ''; //kalau 1 -> buka tag

				echo '
				  <div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
					  <a href="produk/?id_produk='. $posting["id_produk"] .'"><img class="card-img-top" src="'. $posting["gambar_produk"] .'" alt=""></a>
					  <div class="card-body">
						<h4 class="card-title">
						  <a href="produk/?id_produk='. $posting["id_produk"] .'">'. $posting["nama_produk"] .'</a>
						</h4>
						<h5 style="color:green">Rp '. number_format($posting["harga_produk"]) .'</h5>
						<p class="card-text">'. $posting["deskripsi_produk"] .'</p>
					  </div>
					  <div class="card-footer">
						<a href="produk/checkout?id_produk='. $posting["id_produk"] .'"><button type="button" class="btn btn-block btn-success">Beli Sekarang</button></a>
					  </div>
					</div>
				  </div>		  
				';

			echo ($x == 3) || ($z == $total_items) ? "</div><br/>\n" : ''; //kalau 3 or mentok -> tutup pagar
			$x++;
			$z++;	
		}
		?>

		
			  
		<div class="d-flex justify-content-between">
		
		<? if($p != 0){ //jika bukan page 0(awal)-> tampilkan ?>
			<div class="pager-button btn btn-outline-primary disabled">
				<a href="?p=<? echo ($p-1) ?>">&larr; Sebelumnya</a>
			</div>
		<? } ?>
		
		<? if($p != floor($p_total)){ ?>
			<div class="pager-button btn btn-outline-primary">
				<a href="?p=<? echo ($p+1) ?>">Selanjutnya &rarr;</a>
			</div>
		<? } ?>
		
		</div>
		<br/><br/>


      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->	

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
