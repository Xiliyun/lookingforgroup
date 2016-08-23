$(document).ready(function() {
	var root_path = $('#root_path').val();

/**
 * Gets les notifications de l'utilisateur
 */
function get_notifications() {
  $.ajax({
    url:  root_path+'/notifications',
    method: 'GET',
    //data: {msg: message},

    success: function(data) {
      $('#notifications').html(data);
    }
  });
}

// update de la table !!

function updateStatus() {
	$.ajax({
		url: root_path+'/notifications',
		type: 'POST',
		data: {statut: '1', bonjour : 'hello'},
	});

};


$('#notifications').on('click', function(event) {
	

	updateStatus();



});


function boot_notifications() {
	get_notifications();

	setInterval(get_notifications, 2000);

}
// INITIALISATION DE LA RECHERCHE
boot_notifications();
});
