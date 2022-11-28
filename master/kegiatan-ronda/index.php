<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
require_once('../../koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>RW 06 Kebonsari</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../../assets/vendor/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- Calendar CSS -->
      <link rel="stylesheet" href="../../assets/vendor/fullcalendar/lib/main.min.css">
      <!-- Custom Master CSS -->
      <link rel="stylesheet" href="../../assets/css/master.css">
      <style>
        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
      </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php include('../../layouts/master/sidebar.php'); ?>
            </div>
            <div class="col py-3">
                <div class="title mb-4">
                    <h2 class="page-header">Ronda</h2>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div id="calendar"></div>
                  </div>
                  <div class="col-md-3">
                      <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Jadwal Ronda</h5>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="save_schedule.php" method="post" id="schedule-form">
                                    <input type="hidden" name="id" value="">
                                    <div class="form-group mb-2">
                                        <label for="title" class="control-label">Judul</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="description" class="control-label">Deskripsi</label>
                                        <textarea rows="3" class="form-control" name="description" id="description" required></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="start_datetime" class="control-label">Mulai</label>
                                        <input type="datetime-local" class="form-control" name="start_datetime" id="start_datetime" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="end_datetime" class="control-label">Selesai</label>
                                        <input type="datetime-local" class="form-control" name="end_datetime" id="end_datetime" required>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-start">
                                <button class="btn btn-sm btn-primary" type="submit" form="schedule-form"><i class="fa fa-save"></i> Simpan</button>
                                <button class="btn btn-sm btn-danger" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Batal</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Jadwal Ronda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Judul</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Deskripsi</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Mulai</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Selesai</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php 
      $schedules = $db->query("SELECT * FROM schedule_list");
      $sched_res = [];
      foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
          $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
          $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
          $sched_res[$row['id']] = $row;
      }
    ?>
    <?php 
      if(isset($db)) $db->close();
    ?>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="../../assets/vendor/fullcalendar/lib/main.min.js"></script>
    <script>
      var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script src="../../assets/js/script.js"></script>

  </body>
</html>