<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>event admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/adminPage_style.css">
  </head>
  <body>
    <?php
      include 'center.php';
      $center  = new Page();
      $center->header();
      ?>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Technology</a></li>
          <li><a href="#">Education</a></li>
          <li><a href="#">Financial</a></li>
          <li><a href="#">Health</a></li>
          <li><a href="#">Social</a></li>
          <li><a href="#">Hobbies</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
        </ul>
      </div>

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
