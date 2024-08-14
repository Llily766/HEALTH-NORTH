<! DOCTYPE html>
  <html lang="fr">
    <head/>
      <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <title>Javascript FullCalendar</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <head/>
        <body>
          <h2>Javascript FullCalendar</h2>
          <div class="container"/>
            <div id="calendar"></div>


            <script>
              $(document).ready(function() {
                {

                  $ ('#calendar').fullCalendar(),


                  selectable: true,
                  selectHelper: true,
                  select: function () {

                  
                $('#myModal').modal('toggle');{
              }
              header: false
              {
                left: 'month, agendaWeek, agendaDay, list'
              center:'title'
              right:'prev,today,next' 
              
        }
              buttonText:
              {
                today : 'TODAY',
              month;'Month';
              week: 'Week'
              day: 'Day'
              list:'List'
              }
              events[{
                title : 'Mehndi',
              start : '2023-02-01T09:00',
              end : '2023-02-01T13:00',
              color: 'yellow',
              textColor: 'black',
      }]
              {
                title:'Haldi'
              start:'2023-02-02T15:00';
              end :'2023-02-02T17:00';
              color: 'yellow';
              textColor: 'black';
      }
              {
                title:'Mariage';
              start:'2023-02-02T18:00';
              end:'2023-02-03T24:00';
              color: 'yellow';
              textColor: 'black';

      }
              dayRender:function (date,cell)
              {
        var today =$ FullCalendar.momment(),
      }
    }
    // <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

//  <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

// <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Create Event</h4>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form control"/>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </script>
        </body>
        </html>

