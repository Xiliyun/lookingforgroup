<?php
//menu des pages internes du site 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	  <title><?= $this->e($title) ?></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>"> 
</head>
<body>
	<?= $this->section('nav_otherPages') ?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
     	<a class="navbar-brand" href="<?= $this->url('accueil_accueil') ?>">Accueil</a>
        <a class="navbar-brand" href="<?= $this->url('profil_profil') ?>">Profil</a>
        <a class="navbar-brand" href="<?= $this->url('recherche_marecherche') ?>">Recherche</a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
 			
           <!--  <button type="submit" class="btn btn-default">Connectez-vous</button> -->
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


    