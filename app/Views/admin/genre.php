

	<form method="POST">
		<h1>Récupérer tous les genres de l'API the game database</h1>
		<input id="search-genre" type="button" value="Générer !">
		<div id='search-results'></div>

	</form>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="<?=$this->assetUrl('js/admin/api_giantbomb_request.js')?>"></script>
