<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  Pusher.logToConsole = true;
  var pusher = new Pusher('35eb4b1ba793be0cd002', {
    cluster: 'eu'
  });
  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
  
      toastr.error( 'شكوي جديدة' , {
        timeOut: 0,
        extendedTimeOut: 0,
        sound: 'D:\\web\\Laravel projects\\SurveyDash\\public\\mixkit-confirmation-tone-2867.wav', // Specify the path to your sound file here
        onHidden: function() {
          setTimeout(function() {
            location.reload();
          }, 3000); 
        }
      });
   
  });
</script>
