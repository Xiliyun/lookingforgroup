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
      <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>"> 
      <link rel="stylesheet" href="<?= $this->assetUrl('css/style-connexion-inscription.css') ?>"> 
      <link rel="stylesheet" href="<?= $this->assetUrl('css/style-menu.css') ?>"> 



  </head>
<body>

  <div class="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
              <?= $this->insert('templates/header/empty') ?>
              </div>
      </nav>

<div>
  <?= $this->section('content_top') ?>
</div>

<!-- Fond vert formulaire de connexion et inscription -->
<div>
	<?= $this->section('content_form') ?>
</div>


<!-- Affichage contenu pour page de confirmation -->

<div class="container main_content ">
  <div class="row">
      <div class="col-md-12">
        <?= $this->section('main_content') ?>
      </div>
  </div>
</div>


</div>
<!-- end wrapper -->


<footer>
  <div class="container">
    <div class="row">
            <?= $this->insert('templates/footer/simple') ?>
    </div>
  </div>
</footer>






<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>



  <script type="text/javascript" src="http://api.geonames.org/export/geonamesData.js?username=estheremiliefranck"></script>
  <script src="<?= $this->assetUrl('js/inscription/pwstrength-bootstrap-2.0.1.js') ?>"></script>
  <script src="<?= $this->assetUrl('js/inscription/jsr_class.js') ?>"></script>

  <script src="<?= $this->assetUrl('js/inscription/inscription.js') ?>"></script>  <!-- my script -->



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




	
</body>
</html>