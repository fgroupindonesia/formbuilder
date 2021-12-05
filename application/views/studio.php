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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php base_url() ?>js/form-builder.min.js" type="text/javascript"></script>
	<script src="<?php base_url() ?>js/studio.js"></script>
  </head>
  <body>
  
  <input type='hidden' id='hidden-username' value='<?= $this->session->flashdata('username'); ?>'/>
  
  <section class="section">
    <div class="container">
      <h1 class="title">
        Form Builder&trade;
      </h1>
      <p class="subtitle">
        Drag and Drop from the Toolbox right into <strong>the center-canvas</strong> 
      </p>
	 
	 <div class="columns">Form Name : <input id="form-name" name="form-name" type="text"> </div>
	  <div id="canvas" class="columns has-text-centered">
		
	  </div>
	  <div class="columns">
		<button id="saveData" class="button is-info">Save</button>
		<button id="clearData" class="button is-warning">Clear All</button>
	  </div>
	  
    </div>
  </section>
  
  </body>
</html>