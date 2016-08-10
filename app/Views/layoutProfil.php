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
      <link rel="stylesheet" href="<?= $this->assetUrl('css/style-profil.css') ?>"> 
  </head>
  
  <body>
	<div id="wrapper">
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	        	<div class="container-fluid">
	            <?= $this->section('nav_main') ?>
	            </div>
	        </div>
	    </nav>
	</div>

    <div class="container">
      <div class="row">
          <div class="col-md-12 profil-titre">
            <?= $this->section('profil-titre') ?>
          </div>


          <div class="col-md-12">
            <div class="col-md-4">
              <div class="col-md-12 profil-gauche">
                <?= $this->section('profil-gauche') ?>
              </div>
            </div>

            <div class="col-md-8">
              <div class="col-md-12  profil-droite">
              <?= $this->section('profil-droite') ?>
                
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
