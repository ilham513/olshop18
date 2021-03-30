<?php  

$id_produk = $_GET['id_produk'];

$json = file_get_contents('../../data.json');
$posting_raw = json_decode($json, true);

// echo '<pre>';var_dump($posting_raw['produk']["$id_produk"]);die();

$produk = $posting_raw['produk']["$id_produk"];
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Checkout Olshop18</title>

  <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

  <body class="bg-light">
  
    <!-- Navigation -->
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
		  <a class="navbar-brand" href="../../index.php">Olshop18</a>
		</div>
	  </nav>

    <div class="container">
      <div class="py-5 text-center">
        <h2>Checkout Produk</h2>
      </div>

      <div class="row">
        <div id="keranjangbelanja" class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Belanjaan Kamu</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><? echo ucwords($produk['nama_produk']) ?></h6>
              </div>
              <span class="text-muted">RP <? echo number_format($produk['harga_produk']) ?></span>
            </li>
			<!--
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Kode Promo</h6>
                <small>CODESAYA</small>
              </div>
              <span class="text-success">-5000</span>
            </li>
			-->
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>RP <? echo number_format($produk['harga_produk']) ?></strong>
            </li>
          </ul>

		  <!--<a href="#" id="triggerkodepromo" onclick="promobox()">Punya Kode Promo?</a>-->
		  <!--
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
		  -->
        </div>
		
		
        <div class="col-md-8 order-md-1">
          <form class="needs-validation" action="http://hinata18.is-best.net/transaksi/gratis.php" method="post" novalidate>
		  
		  <input type="hidden" name="link_download" value="<? echo $produk['link_download'] ?>">
		  
            <div class="mb-3">
              <label for="nama">Nama</label>
              <div class="input-group">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kamu" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Isi Nama!
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Emailkamu@gmail.com" required>
              <div class="invalid-feedback">
                Isi Email!
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Tahun Lahir</label>
              <select name="tahun_lahir" class="form-control" required>
			  <?php
				$end = date("Y");
				$str = $end - 50;
				
				for ($x = $end; $x >= $str; $x--) {
				  echo "<option>$x</option>\n";
				}
			  ?>
			  </select>
              <div class="invalid-feedback">
                Isi Tahun Lahir
              </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Pembayaran</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Pembayaran Gratis</label>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Lanjutkan</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 HerokuApp</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
	<script>
	function promobox() {
	  document.getElementById("keranjangbelanja").innerHTML += "<form class=\"card p-2\">\r\n            <div class=\"input-group\">\r\n              <input type=\"text\" class=\"form-control\" placeholder=\"Kode Promo\">\r\n              <div class=\"input-group-append\">\r\n                <button type=\"submit\" class=\"btn btn-secondary\">Eksekusi<\/button>\r\n              <\/div>\r\n            <\/div>\r\n          <\/form>";
	  document.getElementById("triggerkodepromo").remove();
	}
	</script>
  </body>
</html>