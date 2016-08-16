$(document).ready(function() {
	

	var mykey = "7fe739eda42e537be89d06218c7172e653c97e6b";


   $("#search-genre").click(function(event) {
      console.log("ça marche");
      event.preventDefault();
      getRequestGenre();
    });
 

    function getRequestGenre(){
      $.ajax ({
          type: 'GET',
          dataType: 'jsonp',
          crossDomain: true,
          jsonp: 'json_callback',
          url: 'http://www.giantbomb.com/api/genres',
          data: {
            api_key: mykey,
            crossDomain: true,
            format: "jsonp",

            }
      }).done(function(data) {

          showResults(data);

      }).fail(function() {
        console.log("nope");
      }).always(function() {

      });
    };
  


  /////////////////////////////////////////////
  //AFFICHAGE
  ////////////////////////////////////////////

     function showResults(result) {
      console.log(result);

      var html = "";
      $.each(result.results, function(index, value) {
        var genre_name = value.name;
        var id_genre = value.id;
        //var platform = value.platforms.name;

        // AFFICHER EN TANT QUE CHAMPS INPUT
        html += "<li>";
        html += "<label>id/nom en anglais/nom en français</label><input name='id_genre[]' value='" + id_genre + "'>";
        html += "<input name='genre_name[]' value='" + genre_name + "'>";
        html += "<input name='genre_name_fr[]'>";

        html += "</li>";
      });
      html += "<input type='submit' name='save' value='Sauvegarder / mettre à jour'>";
      $("#search-results").html(html);
    }


});
