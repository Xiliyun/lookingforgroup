
/**
 * Gets les notifications de l'utilisateur
 */
function get_messages() {
  $.ajax({
    url: '/templates/header/notifications',
    method: 'GET',
    //data: {msg: message},

    success: function(data) {
      $('.user_notifications').html(data);

      //afficherMessages(data)
    }
  });
}