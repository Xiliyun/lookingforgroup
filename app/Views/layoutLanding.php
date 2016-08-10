<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?= $this->e($title) ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="<?= $this->assetUrl('css/style-landing.css') ?>"> 
  </head>
  
  <body>
	<div id="wrapper">
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	        	<div class="container-fluid">
	            <?= $this->section('nav_homepage') ?>
	            </div>
	        </div>
	    </nav>
	</div>


	<div class="header-image-bg" style="background-image:url('<?= $this->assetUrl('img/xbox_hand.jpeg');?>')">
		<div class="container header">
			<div class="row">
		  		<div class="col-md-12 flex-container">
		  			<div class="col-md-6">

	  					<?= $this->section('content_gauche') ?>

		  			</div>
					<div class="col-md-6 jumbotron">

		  				<?= $this->section('content_droite') ?>

		  			</div>
				</div>
			</div>
		</div>
	</div>

<!-- BLOC 1 -->

	<div class="container bloc-1">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">
					<?= $this->section('content_block-1-gauche') ?>
				</div>
				<div class="col-md-4">
					<?= $this->section('content_block-1-centre') ?>
				</div>
				<div class="col-md-4">
					<?= $this->section('content_block-1-droite') ?>
				</div>
			</div>
		</div>
	</div>


    
  </div>	    

	<footer>
		<div class="container">
			<div class="row">
				<p><?= date('Y') ?> | &copy; lookingforgroup | Esther Doan - Emilie Hersant - Franck Vallortigara </p>
			</div>
		</div>
	</footer>



<!-- Script -->

<?= $this->section('customScript') ?>

</body>
</html>
