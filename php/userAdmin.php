<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <title>admin page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
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
      <div><h1>User Admin</h1></div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Roles
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">User Admin</a></li>
            <li><a href="eventAdmin.php">Event Admin</a></li>
          </ul>
          </div>

        <div class="form-check-user form-check-inline">
          <span> User </span>
          <input class="form-check-input" type="radio" checked="checked" name="inlineRadioOptions" id="check1" value="All">
          <label class="form-check-label" for="inlineRadio1">All</label>

          <input class="form-check-input" type="radio"  name="inlineRadioOptions" id="check2" value="user">
          <label class="form-check-label" for="inlineRadio2">Attendent</label>

          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="check3" value="organizer">
          <label class="form-check-label" for="inlineRadio3">Organizer</label>
        </div>
        <div class="tables" id="tb">

      </div>

    </table>

  </div >
  <div class="pdfBtn">
    <form method="post" action="createPDF.php">
      <center>
      <input hidden value="" name="q" id="q">
      <button type='submit' class='btn btn-primary' id="createPDF" >Create PDF</button></center>

    </form>

  </div>

    <?php   $center->footer();
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
      }?>


 <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      delHttp = new XMLHttpRequest();
      pdfHttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("tb").innerHTML=this.responseText;
      }
    }


   $.each($("input[name='inlineRadioOptions']:checked"), function(){
     let q = $('#q')
     xmlhttp.open("GET","dbManage.php?q="+"3",true);
     xmlhttp.send();
     q.val('3')
        });

   $('.form-check-input').change(function() {
     if($(this).val() == "user"){
       xmlhttp.open("GET","dbManage.php?q="+"1",true);
       xmlhttp.send();
     }else if($(this).val() == "organizer"){
       xmlhttp.open("GET","dbManage.php?q="+"2",true);
       xmlhttp.send();
     }else if($(this).val() == "All"){
       xmlhttp.open("GET","dbManage.php?q="+"3",true);
       xmlhttp.send();
     }
  });
  function clicked(id){
    console.log(id);
    delHttp.open("GET","delUserDB.php?q="+id+"&t=user",true);
    // console.log("delUserDB.php?q="+"0"+"&d="+id);
    delHttp.send();
    alert("Delete User !")


  }
  delHttp.onreadystatechange = function() {
    console.log("del !!!!");

    if (this.readyState==4 && this.status==200) {
      let q = $('#q')
      if($("input[name='inlineRadioOptions']:checked").val() == "All"){
        xmlhttp.open("GET","dbManage.php?q="+"3",true);
        xmlhttp.send();
        q.val('3')
      }

      else if($("input[name='inlineRadioOptions']:checked").val() == "user"){
        xmlhttp.open("GET","dbManage.php?q="+"1",true);
        xmlhttp.send();
        q.val('1')
      }else if($("input[name='inlineRadioOptions']:checked").val() == "organizer"){
        xmlhttp.open("GET","dbManage.php?q="+"2",true);
        xmlhttp.send();
        q.val('2')
      }

    }
  }

  pdfHttp.onreadystatechange = function () {
    if (this.readyState==4 && this.status==200) {
      console.log(this.responseText)
    }
  }

  $("input[name='inlineRadioOptions']").on('click', function() {
    let q = $('#q')
    if($("input[name='inlineRadioOptions']:checked").val() == "All"){
      q.val('3')
    }
    else if($("input[name='inlineRadioOptions']:checked").val() == "user"){
      q.val('1')
    }else if($("input[name='inlineRadioOptions']:checked").val() == "organizer"){
      q.val('2')
    }
  })


  </script>


  </body>
</html>
