<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Builder&trade; from FGroupIndonesia!</title>
    <link rel="stylesheet" href="<?php base_url() ?>css/bulma.min.css">
	<link rel="stylesheet" href="<?php base_url() ?>css/fbuilder.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="<?php base_url() ?>js/home.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Form Builder&trade;
      </h1>
      <p class="subtitle">
        Manage your form data from here.
        <br/><span class="reg">Hello, <?= ($multi_data[0]['username']) ?></span>
      </p>
	 
	  <div class="columns has-text-centered">
		<?php for($i=0; $i<sizeof($multi_data); $i++){
			$nama = $multi_data[$i]['name'];
			$div = "<div class='column'>
					<a href='form/data/{$nama}'><img src='". base_url() ."images/doc.png'/><br>". $nama ."</a>
					</div>";
			echo $div;
		}?>
			
	  </div>
	  
    </div>
  </section>
  
  </body>
</html>