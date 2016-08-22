// AFFICHAGE DYNAMIQUE DU MODAL

$('#myModal').on('show.bs.modal', function (event) {
  var profil = $(event.relatedTarget) // Button that triggered the modal

  // DEFINITION DE TOUS LES VARIABLES A PASSER A LA FENETRE MODALE
  var username = profil.data('username') // Extract info from data-* attributes
  var avatar = profil.data('avatar') 
  var gender = profil.data('gender') 
  var age = profil.data('age') 
  var city = profil.data('city') 
  var region = profil.data('region') 
  var description = profil.data('description') 
  var friendship = profil.data('friendship') 
  var love = profil.data('love') 
  var nogoal = profil.data('nogoal') 
  var userurl = profil.data('userurl') 

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-username').text(username)
  modal.find('.modal-avatar').attr("src", avatar)
  modal.find('.modal-gender').text(gender)
  modal.find('.modal-age').text(age)
  modal.find('.modal-city').text(city)
  modal.find('.modal-region').text(region)
  modal.find('.modal-description').text(description)
  modal.find('.modal-friendship').html(friendship)
  modal.find('.modal-love').html(love)
  modal.find('.modal-nogoal').text(nogoal)
  modal.find('.modal-userurl').attr("href", userurl)


})




