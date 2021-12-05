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
        Your favourite minimalist <strong>Form Builder&trade;</strong> forever!
        <br/><span class="reg">Hello, <?= $this->session->flashdata('username'); ?></span>
      </p>
	 
	  <div class="columns has-text-centered">
		<div class="column">
		<a href="studio"><img src="<?php base_url() ?>images/form.png"/><br>Create A Form</a>
		</div>
		<div class="column">
		<a href="manage"><img src="<?php base_url() ?>images/management.png"/><br>Form Data Management </a>
		</div>
		<div class="column">
		<a href="settings"><img src="<?php base_url() ?>images/config.png"/><br>Settings</a>
		</div>
	  </div>
	  
    </div>
  </section>
  
  </body>
</html>