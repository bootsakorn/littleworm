<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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

    <?php   $center->footer(); ?>


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
