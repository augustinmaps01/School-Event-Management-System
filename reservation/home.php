<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<body class = "hold-transition skin-blue sidebar-mini">
<div class = "wrapper">
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        

      </ol>
    </section>

    <section class = "content">
    <div class = "row" style = "margin-top:3%;">
        <div class="col-xs-10" style = "margin-left:10%;">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
    </div>
    
    </section>




    <!-- Main content -->

</div>
<?php include 'footer.php'; ?>


<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>


</div>


<!-- jQuery 3 -->
<script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../dist/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../dist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../dist/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="../dist/bower_components/moment/moment.js"></script>
<script src="../dist/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<?php
$sql = "SELECT room.room_ID, members.Contact_no, reservation.reservation_id, room.name , members.ID_Number, members.firstname, members.middlename, 
                                    members.lastname, reservation.start_time, reservation.end_time, reservation.start_date, reservation.end_date, reservation.status,
                                     reservation.timestamp FROM reservation LEFT JOIN room ON reservation.room_id = room.room_ID
                                      LEFT JOIN members ON reservation.member_id = members.member_id WHERE reservation.status = 'Approved' ";
 $query = $db->query($sql);
 while($rows = $query->fetch_assoc()){ 
   $start_Date = array();  
   $end_Date = array();
  $starting =  array_push($start_Date, $rows['start_date']);
  $ending =  array_push($end_Date, $rows['end_date']);
  array_push($start_Date, $query->num_rows);
  array_push($end_Date, $query->num_rows);

 $starts = date("m-d-Y", strtotime($rows['start_date']));      
    $ends = date("m-d Y", strtotime($rows['end_date']));   
         $month = date('m', strtotime($rows['start_date']));
         $day = date('d', strtotime($rows['start_date']));
         $year = date('Y', strtotime($rows['start_date']));
  
    $start_Date = json_encode($start_Date);
    $end_Date = json_encode($end_Date);
    
$room = array();
$room = $rows['name'];
$room2 = json_encode($room);






             
?>



<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

+    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var reserve_id = '<?php echo $rows['reservation_id']; ?>';
    var rooms = new Array ('<?php echo $room2; ?>');
    var date = new Date()
    var d    = date.getDate(<?php echo $day; ?>),
        m    = date.getMonth(<?php  echo $month; ?>),
        y    = date.getFullYear(<?php echo $year; ?>)
        var start = new Date('<?php echo $rows['start_date']; ?>');
        var end = new Date('<?php echo $rows['end_date']; ?>');

  


    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
        //  title          : rooms,
        //  start :  new Date(start) ,
       //   end: new Date(end),
        start : date,
          allday: true,
          backgroundColor: '#0073b7', //red
          borderColor    : '#0073b7' //red
        },
    

        
        
      ],
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

<?php 
} ?>


</body>
</html>