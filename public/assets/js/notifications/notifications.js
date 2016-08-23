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
		data: {statut: '1'},
	});

};



$('#notifications').on('hover', '.selector', function(event) {
	event.preventDefault();
	updateStatus();
});




function boot_notifications() {
	get_notifications();
	setInterval(get_notifications, 4000);

}
// INITIALISATION DE LA RECHERCHE
boot_notifications();
});
