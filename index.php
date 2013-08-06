<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DNIpsum</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<link href="assets/foundation.css" rel="stylesheet" type="text/css">
		<link href="assets/styles.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="assets/js.js"></script>
        
    </head>
    <body>
     	
 		<div class="row">
     		<div class="column large-12">
     			<h1 class="shadow">DNIpsum</h1>
     		</div>
     	</div>
     
     	<form class="row custom">
     		<div class="column large-6">
	     		<label for="numPara">Number of words</label>
	     		<input type="number" name="numPara">
     		</div>
     		<div class="column large-6">
	     		<label for="lang">Language</label>
	     		<select id="lang" name="lang">
				    <option value="latin">Latinate</option>
			  	    <option value="cyrillic">Cyrillic</option>
				    <option value="sinotibetan">Sino-tibetan</option>
				</select>
			</div>
			<div class="column large-12">
				<input class="small button" id="dn-submit" type="submit" />
			</div>
     	</form>
     	
	 	<div class="row">
     		<div class="column large-12">
	 			<div id="dn-target">
	 				<p>Your content goes here...</p>
	 			</div>
	 		</div>
     	</div>
	     		
    </body>
</html>
