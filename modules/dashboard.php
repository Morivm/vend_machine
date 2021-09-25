<?php
    include 'session.php';
    include '../includes/header.php';
?>
<link href='../lib/main.css' rel='stylesheet' />

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<?php
    include '../includes/topbar.php';
    include '../includes/sidebar.php';
?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
    
       
            <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h4 class="card-title"><button class="btn btn-primary h_mt_add hidefromuser semainteanadd" id="btn_add_asset" name="btn_add_asset"> Add Device</button> </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div class="card-content">
                                    <div class="container">
                                        <h1 class="text-center font-weight-bold">WELCOME TO</h1><br />
                                        <img src="" class="brand-logo" alt="image" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
     

            </div>
        </div>
    </div>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include '../includes/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  
    <script>
   
  //  $(document).ready(function() {
  //   var calendar = $('#calendar').fullCalendar({
  //    editable:true,
  //    header:{
  //     left:'prev,next today',
  //     center:'title',
  //     right:'month,agendaWeek,agendaDay'
  //    },
  //    events: 'dashboard_act.php',
  //    selectable:true,
  //    selectHelper:true,
  //    select: function(start, end, allDay)
  //    {
  //     var title = prompt("Enter Event Title");
  //     if(title)
  //     {
  //      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
  //      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
  //      $.ajax({
  //       url:"insert.php",
  //       type:"POST",
  //       data:{title:title, start:start, end:end},
  //       success:function()
  //       {
  //        calendar.fullCalendar('refetchEvents');
  //        alert("Added Successfully");
  //       }
  //      })
  //     }
  //    },
  //    editable:true,
  //    eventResize:function(event)
  //    {
  //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
  //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
  //     var title = event.title;
  //     var id = event.id;
  //     $.ajax({
  //      url:"update.php",
  //      type:"POST",
  //      data:{title:title, start:start, end:end, id:id},
  //      success:function(){
  //       calendar.fullCalendar('refetchEvents');
  //       alert('Event Update');
  //      }
  //     })
  //    },
 
  //    eventDrop:function(event)
  //    {
  //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
  //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
  //     var title = event.title;
  //     var id = event.id;
  //     $.ajax({
  //      url:"update.php",
  //      type:"POST",
  //      data:{title:title, start:start, end:end, id:id},
  //      success:function()
  //      {
  //       calendar.fullCalendar('refetchEvents');
  //       alert("Event Updated");
  //      }
  //     });
  //    },
 
  //    eventClick:function(event)
  //    {
  //     if(confirm("Are you sure you want to remove it?"))
  //     {
  //      var id = event.id;
  //      $.ajax({
  //       url:"delete.php",
  //       type:"POST",
  //       data:{id:id},
  //       success:function()
  //       {
  //        calendar.fullCalendar('refetchEvents');
  //        alert("Event Removed");
  //       }
  //      })
  //     }
  //    },
 
  //   });
  //  });
    
   </script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: '2020-09-12',
      navLinks: true,
      businessHours: true, 
      editable: true,
      selectable: true,
      events: [
        {
          title: 'Business Lunch',
          start: '2020-09-03T13:00:00',
          constraint: 'businessHours'
        },
        {
          title: 'Meeting',
          start: '2020-09-13T11:00:00',
          constraint: 'availableForMeeting',
          color: '#257e4a'
        },
        {
          title: 'Conference',
          start: '2020-09-18',
          end: '2020-09-20'
        },
        {
          title: 'Party',
          start: '2020-09-29T20:00:00'
        },
        {
          groupId: 'availableForMeeting',
          start: '2020-09-11T10:00:00',
          end: '2020-09-11T16:00:00',
          display: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2020-09-13T10:00:00',
          end: '2020-09-13T16:00:00',
          display: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2020-09-24',
          end: '2020-09-28',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        },
        {
          start: '2020-09-06',
          end: '2020-09-08',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        }
      ]
    });

    calendar.render();
  });

</script> -->
    <script src="../js/dashboard.js"></script>
</body>
</html>
