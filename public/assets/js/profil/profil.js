
$(document).ready(function() {
	

	// comptage de caractère dans la description du profil
	$('#champsDescription').keyup(function () {
	  var max = 1000;
	  var len = $(this).val().length;
	  if (len >= max) {
	    $('#charNum').text(' vous avez atteint la limite de caractères authorisés !');
	  } else {
	    var char = max - len;
	    $('#charNum').text(char + ' caractères restants');
	  }
	});


// survol de la souris lors de l'affichage des boutons amis sur les profils

	$('.btn-ami').on('mouseover',  function(event) {
		$('.btn-ami').addClass('btn-danger');
	});
	$('.btn-ami').on('mouseout',  function(event) {
		$('.btn-ami').removeClass('btn-danger');
	});


	$('.btn-demande-envoyee').on('mouseover',  function(event) {
		$('.btn-demande-envoyee').addClass('btn-danger');
	});
	$('.btn-demande-envoyee').on('mouseout',  function(event) {
		$('.btn-demande-envoyee').removeClass('btn-danger');
	});


	$('.btn-demande-reçue').on('mouseover',  function(event) {
		$('.btn-demande-reçue').addClass('btn-success');
	});
	$('.btn-demande-reçue').on('mouseout',  function(event) {
		$('.btn-demande-reçue').removeClass('btn-success');
	});



// fonction de recherche de jeu

    $('#recherche_nom_genre').on('keyup', function() {
        var pattern = $(this).val();
        $('.searchable-container').hide();
        $('.searchable-container').filter(function() {
            return $(this).text().match(new RegExp(pattern, 'i'));
        }).show();
    });
// Dans espace modification de jeux: selectionner tout ou rien
	$("#check-all").change(function () {
	    $("input:checkbox").prop('checked', $(this).prop("checked"));
	});


});
