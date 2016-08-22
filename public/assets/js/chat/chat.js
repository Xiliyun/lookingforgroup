// important : disable f5
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };

$(document).on("keydown", disableF5);



/**
 * Add a new chat message
 * 
 * @param {string} message
 */

var root_path = $('#root_path').val();
function send_message(message) {
  $.ajax({
    url: root_path+'/chat',
    method: 'post',
    data: {msg: message},
    success: function(data) {
      $('#chatMsg').val('');
     // afficherMessages(data)
      //console.log(data);
      get_messages();
    }
  });
}

/**
 * Gets the chat messages.
 */
function get_messages() {
  $.ajax({
    url: root_path+'/chat/messages',
    method: 'GET',
    //data: {msg: message},

    success: function(data) {
      $('.msg-wgt-body').html(data);
      $('.msg-wgt-body').scrollTop($('.msg-wgt-body')[0].scrollHeight);

      //afficherMessages(data)
    }
  });
}

/**
 * Initializes the chat application
 */

function boot_chat() {
  get_messages();

  var chatArea = $('#chatMsg');
  // Load the messages every 4 seconds
  setInterval(get_messages, 4000);




  chatArea.keydown(function (event) {
    var keypressed = event.keyCode || event.which;
    if (keypressed == 13 ) {
        var chatArea = $('#chatMsg');

        var message = chatArea.val();

        if(message != ""){ // on vérifie que les variables ne sont pas vides
        send_message(message);
        event.preventDefault();



        }



      
    }
});

    // envoi traditionnel sans  entrée
   $('#envoi').click(function(e){
      e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
      var chatArea = $('#chatMsg');

      var message = chatArea.val();

      if(message != ""){ // on vérifie que les variables ne sont pas vides
        send_message(message);
        event.preventDefault();

      }
  });




}

// Initialize the chat
boot_chat();