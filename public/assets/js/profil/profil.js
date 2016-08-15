$(document).ready(function() {
	

	// comptage de caractère dans la description du profil
	$('#champsDescription').keyup(function () {
	  var max = 1000;
	  var len = $(this).val().length;
	  if (len >= max) {
	    $('#charNum').text(' vous avez atteint la limite de caractères authorisés !');
	  } else {
	    var char = max - len;
	    $('#charNum').text(char + ' charactères restants');
	  }
	});


});
