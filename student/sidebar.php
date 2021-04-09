
<?php

include "session.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LMS|student</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <style>
     

        .wrapper {
            
            display: flex;
        }

        .calendar {
            margin: auto;
            width: 600px;
            background-color: #fff;
            box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.2);
       
        }

        .month {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 40px 30px;
            text-align: center;
            background-color: #2ecc71;
            color: #fff;
        }

        .weekdays {
            background-color: #27ae60;
            color: #fff;
            padding: 7px 0;
            display: flex;
        }

        .days {
            font-weight: 300;
            padding: 10px 0;
            display: flex;
            flex-wrap: wrap;
        }

        .weekdays div,
        .days div {
            text-align: center;
            width: 14.28%;
        }

        .days div {
            padding: 10px 0;
            margin-bottom: 10px;
            transition: all 0.4s;
        }

        .prev_date {
            color: #999;
        }

        .today {
            background-color: #27ae60;
            color: #fff;
        }

        .days div:hover {
            cursor: pointer;
            background-color: #dfe6e9
        }

        .prev,
        .next {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 23px;
            background-color: rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
        }

        .prev:hover,
        .next:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.2);
        }

        #month {
            font-size: 30px;
            font-weight: 500;
        }
    </style>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">LMS|Admin dashboard </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light"></a>
        <a href="stu_dashboard.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="admin.php" class="list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#calender"><i class="fa fa-calendar" aria-hidden="true"></i>  Calender</a>
        <a href="leaves.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-pagelines" aria-hidden="true"></i> Leaves</a>
        <a href="attandance.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-file-text" aria-hidden="true"></i> Attandance</a>
      <!--   <a href="chat.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-commenting-o" aria-hidden="true"></i> Chat</a> -->
      <a href="assignment.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-commenting-o" aria-hidden="true"></i> Assignment</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->




      <!-- calander Modal -->
  <div class="modal fade" id="calender" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!-- <div class="modal-header" style="background-color: #2ecc71">
            <h4 class="modal-title">Calander</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div> -->
        <div class="modal-body">
          
          <body onload="renderDate()">
    <div class="wrapper">
        <div class="calendar">
            <div class="month">
                <div class="prev" onclick="moveDate('prev')">
                    <span>&#10094;</span>
                </div>
                <div>
                    <h2 id="month"></h2>
                    <p id="date_str"></p>
                </div>
                <div class="next" onclick="moveDate('next')">
                    <span>&#10095;</span>
                </div>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days">

            </div>
        </div>
    </div>
    <script>
        var dt = new Date();
        function renderDate() {
            dt.setDate(1);
            var day = dt.getDay();
            var today = new Date();
            var endDate = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getDate();

            var prevDate = new Date(
                dt.getFullYear(),
                dt.getMonth(),
                0
            ).getDate();
            var months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]
            document.getElementById("month").innerHTML = months[dt.getMonth()];
            document.getElementById("date_str").innerHTML = dt.toDateString();
            var cells = "";
            for (x = day; x > 0; x--) {
                cells += "<div class='prev_date'>" + (prevDate - x + 1) + "</div>";
            }
            console.log(day);
            for (i = 1; i <= endDate; i++) {
                if (i == today.getDate() && dt.getMonth() == today.getMonth()) cells += "<div class='today'>" + i + "</div>";
                else
                    cells += "<div>" + i + "</div>";
            }
            document.getElementsByClassName("days")[0].innerHTML = cells;

        }

        function moveDate(para) {
            if(para == "prev") {
                dt.setMonth(dt.getMonth() - 1);
            } else if(para == 'next') {
                dt.setMonth(dt.getMonth() + 1);
            }
            renderDate();
        }
    </script>
</body>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="border-color: #2ecc71" data-dismiss="modal">Close <i class="fa fa-calendar" aria-hidden="true"></i>  </button>
        </div>
      </div>
      
    </div>
  </div>