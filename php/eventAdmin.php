<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv=Content-Type content="text/html; charset=tis-620">
    <title>event admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/adminPage_style.css">
  </head>
  <body style="background-color: #b6b6b6;
  font-family: 'Athiti', sans-serif;
  font-size: 18px;">
    <?php
      include 'center.php';
      $center  = new Page();
      $center->header();
      ?>
      <div class="collapse navbar-collapse ">
        <form name="form2" method="post" action="event_page.php">
        <ul class="nav navbar-nav " id="type_event">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="event_page.php?type=Technology">Technology</a></li>
          <li><a href="event_page.php?type=Education">Education</a></li>
          <li><a href="event_page.php?type=Financial">Financial</a></li>
          <li><a href="event_page.php?type=Health">Health</a></li>
          <li><a href="event_page.php?type=Social">Social</a></li>
          <li><a href="event_page.php?type=Hobbies">Hobbies</a></li>
        </ul>
        </form>
        <ul id="login" class="nav navbar-nav navbar-right">
          <li><a href="sign_in.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
          <li><a href="registerSelect.php"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
        </ul>
        <ul id="profile" class="nav navbar-nav navbar-right">
          <li><a id = "username"></a></li>
          <li class="dropdown">
            <a class="glyphicon glyphicon-menu-hamburger" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li class="dropdown-menu-item"><a href="profile.php">ประวัติส่วนตัว</a></li>
              <li id="adt" class="dropdown-menu-item"><a href="user_save_event_page.php">บันทึกการเข้าร่วมกิจกรรม</a></li>
              <li id="org1" class="dropdown-menu-item"><a href="organ_save_event_page.php">บันทึกการจัดกิจกรรม</a></li>
              <li id="org2" class="dropdown-menu-item"><a href="createEvent.php">สร้างกิจกรรม</a></li>
              <li id="adm" class="dropdown-menu-item"><a href="userAdmin.php">จัดการระบบ</a></li>
					    <li class="dropdown-menu-item"><a href="password_change.php">เปลี่ยนรหัสผ่าน</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

      <div class="content">
      <div><h1>Event Admin</h1></div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Roles
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="userAdmin.php">User Admin</a></li>
            <li><a href="#">Event Admin</a></li>
          </ul>
          </div>
        <div class="form-check-event form-check-inline">
          <span> User </span>
          <input class="form-check-input" type="radio" checked="checked" name="inlineRadioOptions" id="check1" value="All">
          <label class="form-check-label" for="inlineRadio1">All</label>

          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="check1" value="Type">
          <label class="form-check-label" for="inlineRadio1">Type</label>


          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="check3" value="Organizer">
          <label class="form-check-label" for="inlineRadio3">Organizer</label>

          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="check3" value="Places">
          <label class="form-check-label" for="inlineRadio3">Places</label>

          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="check2" value="DatePicker">
          <label class="form-check-label" for="inlineRadio2">Date</label>


        </div>
        <div class="dropdown" id="dd">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">filter
          <span class="caret"></span></button>
          <ul class="dropdown-menu scrollable-menu" id="filterBtn">

            <!-- <li><a href="#"></a></li>
            <li><a href="#"></a></li> -->

          </ul>
          </div>

          <div id="dpk">
              <input type="date" name="dateSelect" value="" id="mydate">
              <button type="button" class="btn" onclick="dateClicked()" >search</button>
          </div>

        <div class="tables" id="tbE">

      </div>

    </div>
    <div class="pdfBtn">
      <form method="post" action="createEventPDF.php">
        <center>
        <input hidden value="" name="q" id="q">
        <input hidden value="" name="r" id="r">
        <button type='submit' class='btn btn-primary' id="createPDF" >Create PDF</button></center>

      </form>
    </div>
    <?php
    $center->footer();
    if (empty($_SESSION["email"])){
      echo '<script>
      $("#login").show();
      $("#profile").hide();
       </script>';
      }

    else {
        echo '<script>
          $("#username").html("'.$_SESSION["email"].'");
          $("#login").hide();
          $("#profile").show();
          </script>';
          if ($_SESSION['position'] == 'ADMIN'){
            echo '<script>
              $("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").hide();
               $("#org1").hide();
               $("#org2").hide();
               $("#adm").show();
             </script>';
          } elseif ($_SESSION['position'] == 'USER') {
             
             echo '<script>
             $("#username").html("'.$_SESSION["email"].'");
             $("#login").hide();
             $("#profile").show();
             $("#adt").show();
             $("#org1").hide();
             $("#org2").hide();
             $("#adm").hide();</script>';
          } elseif ($_SESSION['position'] == 'ORGANIZER') {
             echo '<script>$("#username").html("'.$_SESSION["email"].'");
             $("#login").hide();
             $("#profile").show();
             $("#adt").hide();
             $("#org1").show();
             $("#org2").show();
             $("#adm").hide();</script>';
          }
      }
     ?>

     <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
     <script type="text/javascript">

      http1 = new XMLHttpRequest()
      http2 = new XMLHttpRequest()
      delHTTP = new XMLHttpRequest()

      http2.onreadystatechange = function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("tbE").innerHTML=this.responseText;
        }
      }

      http1.onreadystatechange = function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("filterBtn").innerHTML=this.responseText;
          $("#tbE").show();
          $("#filterBtn > li a").on("click", function(e){
            let q = $('#q')
            let r = $('#r')
               if($("input[name='inlineRadioOptions']:checked").val() == "Type"){
                  $("#dpk").hide();
                 let a = "dbEventAdmin.php?q="+"1&r="+$(this).text();
                 console.log(a);
                 http2.open("GET",a,true);
                 http2.send();
                 q.val('1');
                 r.val($(this).text());
               }

               else if($("input[name='inlineRadioOptions']:checked").val() == "Organizer"){
                 let q = $('#q')
                 let r = $('#r')
                  $("#dpk").hide();
                 console.log($(this).text());
                 http2.open("GET","dbEventAdmin.php?q="+"5&r="+$(this).text(),true);
                 http2.send();
                 q.val('5');
                 r.val($(this).text());
               }else if($("input[name='inlineRadioOptions']:checked").val() == "Places"){
                 let q = $('#q')
                 let r = $('#r')
                  $("#dpk").hide();
                 console.log($(this).text());
                 http2.open("GET","dbEventAdmin.php?q="+"6&r="+$(this).text(),true);
                 http2.send();
                 q.val('6');
                 r.val($(this).text());
               }



          });
        }
      }

      $.each($("input[name='inlineRadioOptions']:checked"), function(){
        let q = $('#q')
        let r = $('#r')
        console.log("testttt");
        $("#dd").hide();
        $("#dpk").hide();
        http2.open("GET","dbEventAdmin.php?q="+"0"+"&r=''",true);
        http2.send();
        q.val('0');
        r.val($(this).text());
           });
           $('.form-check-input').change(function() {
             $("#dd").show();

             if($(this).val() == "Type"){
               console.log("in type");

                $("#dpk").hide();
               http1.open("GET","filterDropdown.php?q="+"1",true);
               http1.send();
             }

             else if($(this).val() == "DatePicker"){
               let q = $('#q')
               let r = $('#r')

               $("#dpk").show();
               $("#dd").hide();
               q.val('2');
               r.val($(this).text());
             }
             else if($(this).val() == "Organizer"){
                $("#dpk").hide();

               http1.open("GET","filterDropdown.php?q="+"5",true);
               http1.send();
             }else if($(this).val() == "Places"){
                $("#dpk").hide();

               http1.open("GET","filterDropdown.php?q="+"6",true);
               http1.send();
             }
             else if($(this).val() == "All"){
               let q = $('#q')
               let r = $('#r')
                $("#dpk").hide();
                $("#dd").hide();
                $("#tbE").show();
                http2.open("GET","dbEventAdmin.php?q="+"0"+"&r=''",true);
                http2.send();
                q.val('0');
                r.val($(this).text());
             }

           });

           function dateClicked(){
               let q = $('#q')
               let r = $('#r')
               var d = document.getElementById("mydate").value;
               console.log(d);
               http2.open("GET","dbEventAdmin.php?q="+"2"+"&r="+d,true);
               http2.send();

               q.val('2');
               r.val(d);
               console.log(q.val('2') + r.val(d));
           }
           function clickedEvent(id) {
             console.log(id);
             delHTTP.open("GET","delUserDB.php?q="+id+"&t=event",true);
             delHTTP.send();
             alert("Delete Event !")
           }
           delHTTP.onreadystatechange = function() {
             let q = $('#q')
             let r = $('#r')
             if (this.readyState==4 && this.status==200) {
               if($("input[name='inlineRadioOptions']:checked").val() == "Type"){
                 $("#dpk").hide();
                 let a = "dbEventAdmin.php?q="+"1&r="+$(this).text();
                 console.log(a);
                 http2.open("GET",a,true);
                 http2.send();
                 q.val('1');
                 r.val($(this).text());
               }

               else if($("input[name='inlineRadioOptions']:checked").val() == "Organizer"){
                 console.log($(this).text());
                 $("#dpk").hide();
                 http2.open("GET","dbEventAdmin.php?q="+"5&r="+$(this).text(),true);
                 http2.send();
                 q.val('5');
                 r.val($(this).text());
               }else if($("input[name='inlineRadioOptions']:checked").val() == "Places"){
                 console.log($(this).text());
                 $("#dpk").hide();
                 http2.open("GET","dbEventAdmin.php?q="+"6&r="+$(this).text(),true);
                 http2.send();
                 q.val('6');
                 r.val($(this).text());
               }else if($("input[name='inlineRadioOptions']:checked").val() == "All"){
                 console.log($(this).text());
                 $("#dpk").hide();
                 $("#dd").hide();
                 http2.open("GET","dbEventAdmin.php?q="+"0&r="+$(this).text(),true);
                 http2.send();
                 q.val('0');
                 r.val($(this).text());
               }else if($("input[name='inlineRadioOptions']:checked").val() == "DatePicker"){
                 console.log($(this).text());
                 $("#dpk").show();
                 $("#dd").hide();
                 http2.open("GET","dbEventAdmin.php?q="+"2&r="+$(this).text(),true);
                 http2.send();
                 q.val('2');
                 r.val($(this).text());
               }
             }
           }



    </script>


  </body>
</html>
