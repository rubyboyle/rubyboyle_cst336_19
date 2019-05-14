<?php
// session_start();

include 'inc/db-connection.php';
$dbConn = startConnection("final_scheduler");
// include 'functions.php';
// validateSession();

if (isset($_GET['addAppointment'])) { //checks whether the form was submitted
    
    $date = $_GET['date'];
    $start_time =  $_GET['start_time'];
    $end_time =  $_GET['end_time'];
    $booked_by =  $_GET['booked_by'];
    
    $sql = "INSERT INTO appointments (date, start_time, end_time, booked_by) 
            VALUES (:date, :start_time, :end_time, :booked_by);";
            
    $np = array();
    $np[":date"] = $date;
    $np[":start_time"] = $start_time;
    $np[":end_time"] = $end_time;
    $np[":booked_by"] = $booked_by;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Appointment was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <script>
          /*global $*/
            function confirmDelete() {

                return confirm("Are you sure you want to remove this timeslot? It cannot be undone.");
                
            }
          $( function() {
            $( "#datepicker" ).datepicker();
          } );
          </script>
          
    </head>
    <body>
        <form action="php/logout.php">
              <input class="login100-form-btn"type="submit" value="Logout">
        </form>
        <br><br>
      Invite Link:<input type="text"><br><br>
        <!--later replace this with an Ajax call to the API I created-->
        
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Date</th> 
              <th scope="col">Start Time</th>
              <th scope="col">Duration</th>
              <th scope="col">Booked By</th> 
              <th><a href="#" class="add-appointment">Add Appointment</a></th>
            </tr>
            <tr id=results>
            </tr>
          </thead>
       </table>
  
        
        
        <!-- Modal -->
        <div class="modal fade" id="add-appointment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Adding New Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form>
                       <p>Date: <input type="text" id="datepicker" name="date"></p>
                       <p>Start Time <input type="text" id="timepicker" name="start_time"></p>
                       <p>End Time <input type="text" id="timepicker" name="end_time"></p>
                       <p>Booked By <input type="text" name="booked_by"></p>
                       <input type="submit" id="addAppointmentButton" name="addAppointment" value="Add Appointment">
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div> 
        
        <!-- Delete Modal -->
        <div class="modal fade" id="delete-appointment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="delete"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            <script>
            /*global $*/
            $(document).ready(function(){
            
                   $.ajax({ 
                        type: "GET",
                        url: "inc/get-appointment-api.php",
                        dataType: "json",
                        success: function(data, status) {
                                  // $("#results").html("<tr>");
                                  // $("#results").html("<th scope='col'>Date</th>");
                                  // $("#results").html("<th scope='col'>Start Time</th>");
                                  // $("#results").html("<th scope='col'>Duration</th>");
                                  // $("#results").html("<th scope='col'>Booked By</th>");
                                  // $("#results").html("<th><a href="#" class="add-appointment">Add Appointment</a></th>");
                                  // $("#results").html("</tr>");
                                  // $("#results").html("<thead>");
                                  // $("#results").html("<tr>");
                                  // $("#results").html("<th scope='col'>Date</th>");
                                  // $("#results").html("<th scope='col'>Start Time</th>");
                                  // $("#results").html("<th scope='col'>Duration</th>") ;
                                  // $("#results").html("<th scope='col'>Booked By</th>") ;
                                  // $("#results").html("<th><a href='#' class='add-appointment'>Add Appointment</a></th>");
                                  // $("#results").html("</tr>") ;
                                  // $("#results").html("</thead>") ;
                                  // $("#results").html("<tbody>"); 
                            data.forEach(function(key) {
                                       $("#results").append("<tr>"+
                                                            "<td id = 'scope='row'>" + key.date + "</td>"+
                                                            "<td id = 'start-column'>" + key.start_time + "</td>"+
                                                            "<td id = 'start-column'>" + key.end_time + "</td>"+
                                                            "<td id = 'start-column'>" + key.booked_by + "</td>"+
                                                            "<td id = 'details-column'><a onclick='openModal()' target='productModal' class='btn btn-primary' role='button'>Details</a></td>" +
                                                            "<td id = 'details-column'><form action='inc/delete-appointment.php' onsubmit='return confirmDelete()'>" +
                                                            "<input type='hidden' name='id' value='"+ key.id +"'>" +
                                                            "<button class='btn btn-outline-danger' id='delete-app' type='submit'>Delete</button>" +
                                                            "</form>"+
                                                            "</td>"+
                                                            "</tr>");
                            });
                                  // $("#results").html("<tbody>") +
                                  // $("#results").html("</table>");
                        },
                   });
  
            });//documentReady
            
            $(document).on('click', '.add-appointment', function(){
                $('#add-appointment-modal').modal("show");
                
                $('#addAppointmentButton').on('click',function(){
                  var date= $('#date').val();
                  var start_time= $('#start_time').val();
                  var end_time= $('#end_time').val();
                  var booked_by= $('#booked_by').val();
                $.ajax({
                    type: "GET",
                    url: "inc/add-appointment-api.php",
                    dataType: "json",
                    data: {
                            'date': date,
                            'start_time': start_time,
                            'end_time': end_time,
                            'booked_by': booked_by
                        },
                    success: function(data, status) {
                      console.log("successful");

                    }
                });
            });
            });
            
               $(document).on('click', '#delete-app', function(){
                $('#delete-appointment-modal').modal("show");
                $.ajax({
                    type: "GET",
                    url: "inc/delete-appointment.php",
                    dataType: "json",
                    data: {"id" : $(this).attr("id")},
                    success: function(data, status) {
                      
                            data.forEach(function(key){
                                $("#delete").append("Date: " + key['date'] + "<br>");
                                $("#delete").append("Start Time: " + key['start_time'] + "<br>");
                                $("#delete").append("End Time:" + key['end_time'] + "<br>");
                                $("#delete").html("Are you sure you want to remove this time slot? This cannot be undone.");
                            });
               
                    },
                });
            });
            

            
        </script>
    </body>
</html>