<?php  
$posting_raw = array("satu", "dua", "tiga", "empat", "lima", "enam","tujuh", "delapan", "sembilan", "sepuluh", "sebelas"); 


//algoritma p array
if(isset($_GET['p'])){
	$p = $_GET['p'];
}else{
	$p = 0;
}

$mulai = $p * 6;
$puncak = $mulai + 6;

for ($a = $mulai; $a < $puncak; $a++) {
	if ($posting_raw[$a] == null){continue;}
  $posting[] = $posting_raw[$a];
}


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
        <div class="list-group">
          <a href="#" class="list-group-item">Game Dewasa PC</a>
          <a href="#" class="list-group-item">Game Dewasa PC</a>
          <a href="#" class="list-group-item">Game Dewasa PC</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          </ol>
          <div class="carousel-inner" role="listbox 900x350">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://i.postimg.cc/LsXDDntf/image.png" alt="First slide">
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
					  <a href="produk/ninja-vs-monster"><img class="card-img-top" src="https://i.postimg.cc/6qMC14kn/image.png" alt=""></a>
					  <div class="card-body">
						<h4 class="card-title">
						  <a href="produk/ninja-vs-monster">'. $posting .'</a>
						</h4>
						<h5>RP 100.000</h5>
						<p class="card-text">Seorang ninja mencoba melarikan diri dari kejaran monster yang mencoba memp*rk*s*nya!</p>
					  </div>
					  <div class="card-footer">
						<button type="button" class="btn btn-block btn-success">Beli Sekarang</button>
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
			<div class="pager-button btn btn-outline-primary disabled">
				<a>&larr; Sebelumnya</a>
			</div>

			<div class="pager-button btn btn-outline-primary">
				<a>Selanjutnya &rarr;</a>
			</div>
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
