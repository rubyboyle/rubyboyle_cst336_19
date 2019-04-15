<!DOCTYPE html>
<html>
<head>
    <!--if you refresh everytime a new profile pops up-->
    <title> Match @ Cinder </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
         ul, h1 {
          list-style-type: none;
          margin: 0;
          padding: 0;
          text-align:center;
        }
        
        table,
        tr,
        td {
            border: 1px solid;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        table {
            width: 30%;
            border-spacing: 0;
            margin: 0 auto;
        }
        
        #matchImage {
            margin-right:10px;
        }

        #matchUsername {
            font-size:20px;
        }
        
    </style>
</head>

<body>
<ul>
  <li><a href="index.php">Match</a></li>
  <li><a href="history.php">History</a></li>
</ul>
    <h1> Match  </h1><br>

    <script>
        /*global $*/
        $(document).ready(function() {
            
            $.ajax({
                type: "GET",
                url: "api/getRandomBio.php",
                dataType: "json",
                success: function(data) {
                    if (data.length != 0) {
                        $("#matchImage").append("<img src='" + data.picture_url + "'  />");
                        $("#matchUsername").html("About @" + data.username);
                        $("#matchBio").html(data.about_me);
                    }
                }
            });

        });
    </script>
    
    
    <div id="matchImage" class="float-left"></div>
    <div id="matchUsername"></div>
    <div id="matchBio"></div><br><br>
    <div id="matchDislike"><a href="#">Match</a></div>
    <div id="matchMeh"><a href="#">Meh</div>
    <div id="matchLike"><a href="#">Like</div>
    

<br><br><br><br><br><br><br><br><br><br><br><br><br>

<table>
<thead>
<tr>
<th style="text-align:left">#</th>
<th style="text-align:left">Task Description</th>
<th style="text-align:left">Points</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left">1</td>
<td style="text-align:left">Active potential matches are pulled from MySQL using AJAX and a PHP API endpoint, and provides unmatched users, and is displayed using the specified page design</td>
<td style="text-align:left">40</td>
</tr>
<tr>
<td style="text-align:left">2</td>
<td style="text-align:left">The match history is pulled from MySQL using AJAX and a PHP API endpoint, and provides the data for all matches, whether or not there is history, and is displayed using the specified page design</td>
<td style="text-align:left">0</td>
</tr>
<tr>
<td style="text-align:left">3</td>
<td style="text-align:left">The information modal is popped up with the "About Me" information for the match</td>
<td style="text-align:left">5</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">TOTAL</td>
<td style="text-align:left">47</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">This rubric is properly included AND UPDATED (BONUS)</td>
<td style="text-align:left">2</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">A separate report that shows the number of matches by category is available from navigation and shows the correct numbers, and is cleanly formatted</td>
<td style="text-align:left">0</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">After all potential matches have been displayed, the buttons are disabled and a message is displayed; once the message has been closed the user is navigated to the history page</td>
<td style="text-align:left">0</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">The relative time is displayed in the history page instead of actual date and time</td>
<td style="text-align:left">0</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">Users who liked the current user are pulled from MySQL using AJAX and a PHP API endpoint, and are displayed using the specified page design</td>
<td style="text-align:left">0</td>
</tr>
</tbody>
</table>
 
</body>

</html>