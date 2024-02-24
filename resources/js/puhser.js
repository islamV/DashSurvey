Pusher.logToConsole = true;
var pusher = new Pusher('35eb4b1ba793be0cd002', {
  cluster: 'eu'
});
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
if(data){
    toastr.error( 'شكوي جديدة' , {
      timeOut: 0,
      extendedTimeOut: 0,
    
    });
  }else{console.error('Invalid data structure received:', data);}
});