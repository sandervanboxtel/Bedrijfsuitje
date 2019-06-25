<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
  </head>
  <body>
	<header>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
			<a href="index.php?page=home" class="navbar-left"><img class="logo" src="images/anker.png"></a>
			<a class="navbar-brand" href="index.php?page=home"><h1>Het Anker</h1></a>

			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=activiteiten">Activiteiten</a>
					</li>
					<?php
						if(isset($_SESSION['loggedIn'])){
							if($_SESSION['rol']  == 1) {
								echo '<li class="nav-item"><a class="nav-link" href="index.php?page=userpanel">Userpanel</a></li>';
								echo '<li class="nav-item"><a class="nav-link" href="index.php?page=adminpanel">Adminpanel</a></li>';
							}

							else {
								echo '<li class="nav-item"><a class="nav-link" href="index.php?page=userpanel">Userpanel</a></li>';
							}						
							
							echo '<li class="nav-item"><form method="post"><div class="form-row align-items-center"><div class="col-12"><button name="logout" class="btn loginBtn" type="submit">Logout</button></div></div></form></i>';
						}
						else{
							echo '<li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>'; 
						}
					?>
				</ul>
			</div>
		</nav>
	</header>

	<main>
		
	</main>
<?php

#Logout functie
	if(isset($_POST['logout']))
	{
		session_destroy();
		header("Location: index.php?page=login");
		exit();
	}
?>
	
