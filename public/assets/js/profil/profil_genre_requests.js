// $(document).ready(function() {
	
// ça marche pas je laisse tomber
// 		// TODO DEFINIR AJAX UNIQUEMENT SUR LA PAGE 
// 		// Ajax pour les genres
			
			
	

// 			// UNE FOIS AJAX LOADE, on affiche
// 				$.ajax({
// 							url:  "allGenreData",
// 							type: 'GET',
// 							dataType: 'json',
// 						})
// 						.done(function(data) {
// 							console.log(data);
// 							afficherGenres(data);
// 						})
// 						.fail(function() {
// 							console.log("error");
// 						})
// 						.always(function() {
// 							console.log("complete");
// 						});


// 			// si jamais on fait une recherche dynamique


// 			var affichage ="";
// 			function afficherGenres(data) {
// 				$("#afficher_genres").empty();

// 				$.each(data, function(value, objetGenre) {
// 					var id_genre = objetGenre['id_genre'];
// 					var genre = objetGenre['genre_name'];
// 					affichage += '<input type="hidden" value="'+id_genre+'">';
// 					affichage += '<label class=""><input id="genre_field" type="checkbox" value="'+genre+'">'+genre+'</label>';
// 	     			$("#afficher_genres").html(affichage);



// 						$("#recherche_nom_genre").on('input', function(event) {
// 							var $recherche_genre = $("#recherche_nom_genre").val();
// 							if($("#genre_field").val().indexOf($recherche_genre) != -1)
// 								{
// 								   console.log($("#genre_field"));
// 								}

// 						}); // end function recherche






// 				});// end .each()
// 			} // end function afficher




// });