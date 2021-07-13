<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script src="/javascripts/jquery-3.3.1.min.js"></script>
		<script src="/javascripts/jqscripts.js"></script>
		<title>DuquesneIT</title>
	</head>
	<header id="head">
		<div id="header">	
		<a href="http://siteperso"><img id="logo" src="images/RedFox.png"></a>
			<h1 id="title">Duquesne IT</h1>
			<h3 id="subtitle">Solutions VBA/VB et web</h3>
		</div >
		
		<ul id="menu">
			<li><a href="#spirit"><img src="images/hello.png" title="Présentation" alt="Présentation"></a></li>      
			<li><a href="#vba"><img src="images/VB.png" title="Interventions en VBA/VB" alt="Interventions en VBA/VB"></a></li>
			<li><a href="#web"><img src="images/web.png" title="Interventions web" alt="Interventions web"></a></li>
			<li><a href="#deal"><img src="images/deal.png" title="Tarifs et conditions" alt="Tarifs et conditions"></a></li>
			<li><a href="#cv"><img src="images/CV.png" title="CV de Nicolas Duquesne" alt="CV de Nicolas Duquesne"></a></li> 
			<li><a href="#contact"><img src="images/mail.png" title="Contact mail" alt="Contact mail"></a></li>
		</ul>
	</header>
	<div id="body">
		<?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
		
		<?= $content ?>
		
		<form class="texts" id="contact" action="index2.html" method="post">
			<div class="titles">
				<img src="images/mail.png" title="Contact mail" alt="Contact mail">
				<h2>Contact</h2>
			</div>
			<?= $form ?>
			
		</form>
	</div>
	<div id="footer">
		<img id="logo2" src="images/logo2.png">
		<p id="coord">
		EI Nicolas Duquesne
		SIREN : 841 808 637 
		N°tel : 06 70 16 28 29
		</p>
	</div>	
</html>