<?php require_once('koneksi.php'); ?>
<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Project RW 06</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- Calendar CSS -->
      <link rel="stylesheet" href="assets/vendor/fullcalendar-3.4.0/fullcalendar.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="assets/css/style.css">
    </head>
  <body>
    
    <?php include ('layouts/header.php') ?>

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="title mb-5">
              <h1>Kegiatan Ronda</h1>
            </div>
            <div id="calendar"></div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="CalendarModal" tabindex="-1" aria-labelledby="CalendarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="CalendarModalLabel">Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong>Judul Ronda : </strong>
                <p id="title"></p>
                <strong>Anggota Ronda : </strong>
                <p id="description"></p>
                <strong>Tanggal & Waktu Mulai Ronda : </strong>
                <p id="start"></p>
                <strong>Tanggal & Waktu Selesai Ronda : </strong>
                <p id="end"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>   

    <?php include ('layouts/footer.php') ?>
    
    <script src="assets/vendor/fullcalendar-3.4.0/lib/jquery.min.js"></script>
    <script src="assets/vendor/fullcalendar-3.4.0/lib/moment.min.js"></script>
    <script src="assets/vendor/fullcalendar-3.4.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(function() {

          var calendar = $('#calendar').fullCalendar({
              header:{
                  left:'prev,next today',
                  center:'title',
                  right:'month,agendaWeek,agendaDay'
              },
              events: 'load_schedule.php',
              timeFormat: 'H(:mm)',
              eventClick: function(event,jsEvent, view) {
                  var modal = $('#CalendarModal');
                  modal.find('#title').text(event.title);
                  modal.find('#description').text(event.description);
                  modal.find('#start').text(moment(event.start).format('DD MMMM YYYY HH:mm A'));
                  modal.find('#end').text(moment(event.end).format('DD MMMM YYYY HH:mm A'));
                  modal.modal('show');
              },
              eventRender: function(event,element) {
                  element.find('.fc-title').append("<br/> Anggota : <br/>" + event.description);
              },
              selectable:true,
              selectHelper:true,
          })

          // $('#calendar').fullCalendar({
          //     events: 
          //     [ 
          //         { 
          //             id: 1, 
          //             title: 'First Event', 
          //             start: '2022-12-09',
          //             description: 'first description' 
          //         }, 
          //         { 
          //             id: 2, 
          //             title: 'Second Event', 
          //             start: '2022-12-10',
          //             description: 'second description'
          //         }
          //     ], 
          //     eventRender: function(event, element) { 
          //         element.find('.fc-title').append("<br/>" + event.description); 
          //     } 
          // })
          })
    </script>
  </body>
</html>