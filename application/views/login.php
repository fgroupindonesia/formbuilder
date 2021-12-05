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
	<script src="<?php base_url() ?>js/registration.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Form Builder&trade;
      </h1>
      <p class="subtitle">
        Your favourite minimalist <strong>Form Builder&trade;</strong> forever!
        <br/><span class="reg">Are you a new user? <a href="#">Click here to register</a></span>
		<span class="log">You already have an account? <a href="#">Click here to login</a></span>
      </p>
	  <form action="/login/verification" method="post">
	  <div class="columns">
	  <div class="column is-one-quarter">Username:</div><input name="username" class="column" type="text"/>
	  </div>
	  <div class="columns">
	  <div class="column is-one-quarter">Password:</div><input name="pass" class="column" type="password"/>
	  </div>
	  <div class="columns reg-input">
	  <div class="column is-one-quarter">Email:</div><input id="email" class="column" name="email" type="email"/>
	  </div>
	  <div class="columns">
	  <button id="submit-button"  type="submit" class="button is-primary">Login</button>
	  <button id="reg-button" type="submit" disabled class="button is-info">Register</button>
	  </div>
	  </form>
	  
    </div>
  </section>
  

  </body>
</html>