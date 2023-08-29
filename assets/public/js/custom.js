$('.loader').hide();
var interval;
function countdown() {
  clearInterval(interval);
  interval = setInterval( function() {
      var timer = $('.countdown').html();
      timer = timer.split(':');
      var minutes = timer[0];
      var seconds = timer[1];
      seconds -= 1;
      if (minutes < 0) return;
      else if (seconds < 0 && minutes != 0) {
          minutes -= 1;
          seconds = 59;
      }
      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

      $('.countdown').html(minutes + ':' + seconds);

      if (minutes == 0 && seconds == 1){
        stop_video();
        $("#stop-record").click(); 
        $('.remaining-time').addClass('d-none');
      };
  }, 1000);
}


let camera_button = document.querySelector("#startquestion");
let video = document.querySelector("#video");
let stop_button = document.querySelector("#stop-record");
let start_agian = document.querySelector('#start-agian');

var camera_stream = null;
var media_recorder = null;
var blobs_recorded = [];

camera_button.addEventListener('click', async function() {
    camera_stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
    video.srcObject = camera_stream;  
    media_recorder = new MediaRecorder(camera_stream, { mimeType: 'video/webm' });
     $('.countdown').text("2:00");
     $('.remaining-time').removeClass('d-none');
     $('#starta').removeClass('d-none');
     $('#startr').addClass('d-none');
    countdown();
    media_recorder.addEventListener('dataavailable', function(e) {
        blobs_recorded.push(e.data);
    });
    media_recorder.addEventListener('stop', function() {
        var recording = new File(blobs_recorded, 'recording.webm', { type: 'video/webm' });
        var data = new FormData();
        var role = document.getElementById('role_inquestion').value;
        var order = document.getElementById('order_detils').value;
        var number = document.getElementById('question_no').value;
        data.append('file', recording);
        data.append('role',role);
        data.append('order',order);
        data.append('number',number);
        $('.loader').show();
         $.ajax({
            url : site_url + "/nextquestion",
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
              var response = JSON.parse(response);
              console.log(response);
              if(response.status == 2){
                $('.loader').hide();
                      window.location = site_url + '/success';
              }
               else if(response.status == 1){
                  if(response.question == '' || response.question == null || response.question == 'undefined'){
                      $('#stop-record').html('Submit');
                  }
                 $('#question_count').html(response.order);
                 $('#question').html(response.question);
                 $('#role_inquestion').val(response.role);
                 $('#order_detils').val(response.order);
                  $('#question_nos').html(response.number);
                  $('#question_no').val(response.number);
                  $('#startr').removeClass('d-none');
                  $('#starta').addClass('d-none');
                  camera_stream = null;
                  media_recorder = null;
                  blobs_recorded = [];
                  blobs_recorded.length = 0;
                  recording.length = 0;
                 video.srcObject = camera_stream;
                 countdown();
                 $('.remaining-time').addClass('d-none');
                 $('.loader').hide();
              }
            }
          });
    });
    media_recorder.start(1000);
});

stop_button.addEventListener('click', function() {
    stop_video();
});

function stop_video() {
    if(media_recorder == null){
        swal.fire({
            title: "<i class='fa fa-times fa-2x text-dark'></i>",
             text: "Please start recording your video", 
            type: "danger",
            });
    }
   media_recorder.stop();
}

start_agian.addEventListener('click', function() {
  console.log('1');
  var camera_stream = null;
  var media_recorder = null;
  var blobs_recorded = [];
  blobs_recorded.length = 0;
 video.srcObject = camera_stream;
 countdown();
  $('.remaining-time').addClass('d-none');
  $('#startr').removeClass('d-none');
  $('#starta').addClass('d-none');

});

 window.history.forward();
 function noBack() { 
      window.history.forward(); 
 }