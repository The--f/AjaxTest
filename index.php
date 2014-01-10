<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
      <title>Ajax Test</title>
      <!-- Bootstrap -->
    <link href="./dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./dist/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="./dist/css/styles.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="./dist/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="./js/jquery/jquery-2.0.3.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" >
    function loadHTMLDoc()
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
        else
            {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState===4 && xmlhttp.status===200){
                    document.getElementById("tablediv").innerHTML=xmlhttp.responseText;
                    document.getElementById("panel1div").setAttribute('class',"panel panel-success" );
                }
            };
            xmlhttp.open("post","form_action_html_response.php" ,true);
            xmlhttp.send();
            }
    function loadXMLDoc(){
        var xmlhttp;
        if (window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
        else{
            // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState===4 && xmlhttp.status===200){
                    document.getElementById("xmldiv").innerHTML=xmlhttp.responseText;
                    document.getElementById("panel2div").setAttribute('class',"panel panel-success" );
                    document.getElementById("xmlframe").setAttribute('src',"./form_action_xml.php");
                }
            };
            xmlhttp.open("post", "form_action_xml.php", true);
            xmlhttp.send();
        }
            /**  State  Description
                0      The request is not initialized
                1      The request has been set up
                2      The request has been sent
                3      The request is in process
                4      The request is complete
             * */




  $('document').ready(function(){
      $('.btn').button();
//      $('#vform').change(function (){
      $('#vform').submit(function(){
          $('#subbutn').html("<div class=\"progress progress-striped active\">"+
                  "<div class=\"progress-bar\"  role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">"+
                "</div></div>");
        


          $.ajax({
                type: 'POST',
                async: 'true',
                url: 'login.php',
                data: {
                    name: $('#name').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    if (response == '1') {
                        $('#login_heading').html("<h3> Access Granted<h3>");
                        document.getElementById("panel3div").setAttribute('class',"panel panel-success" );
                        setTimeout(function() {
                            $('#formeediv').html("<h1> WELCOME </h1>");
                                 }, 3000);
                    }
                    else if (response == '2') {
                        $('#login_heading').html("<h3> Name Or password False try again <h3>");
                         document.getElementById("panel3div").setAttribute('class',"panel panel-warning" );
                         $('#name').focus();
                          $('#subbutn').html("Sign In");
                    }
                    else if (response == '3') {
                         $('#vform').addClass('.has-error');
                         $('#name').addClass('has-error');
                         $('#password').addClass('has-error');
                         $('#login_heading').html("<h3> All inputs are required<h3>");
                         document.getElementById("panel3div").setAttribute('class',"panel panel-danger" );
                          $('#subbutn').html("Sign In");
                          }
                      },
                      error: function(){ alert('AJAX ERROR');}
                  });
                  return false ;
              });
    });
    </script>
  </head>
  <body>
      <div class="container-fluid col-md-offset-1" >
          <div class="span1"></div>
          <div class="span8">
              <div class="panel panel-primary" id="panel1div">
                  <div class="panel-heading"><h3>Simple HTML response </h3></div>
                  <div class="panel-body">
                      <div class="span2 left">
                          <button  type="button" class="btn btn-default btn-sm" onclick="loadHTMLDoc();">
                              <span class="glyphicon glyphicon-user"></span><h4>List of  all users</h4>
                          </button>
                      </div>
                      <div class="container span5 right" id="progressdiv"> </div>
                      <div class="container span5 right" >
                          <table class="table" id="tablediv">

                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="span2"></div>
      </div>
      <div class="container-fluid col-md-offset-1" >
          <div class="span1"></div>
          <div class="span8">
              <div class="panel panel-primary" id="panel2div">
                  <div class="panel-heading"><h3>Simple XML response </h3></div>
                  <div class="panel-body">
                      <div class="span2 left">
                          <button  type="button" class="btn btn-default btn-sm" onclick="loadXMLDoc();">
                              <span class="glyphicon glyphicon-user"></span><h4>GET the XML </h4>
                          </button>
                      </div>
                      <div class="container span5 right" >
                          <div class="" id="xmldiv" ></div>
                          <iframe id="xmlframe" seamless="on" src="" /></iframe>
                      </div>
                  </div>
              </div>
          </div>
          <div class="span2"></div>
      </div>
      <div class="container-fluid col-md-offset-1">
          <div class="span1"></div>
          <div class="span8">
              <div class="panel panel-primary" id="panel3div">
                  <div class="panel-heading" id="login_heading"><h3>Simple Form sign in </h3></div>
                  <div class="panel-body">
                      <div class="container span3 right"  id="formeediv">
                          <form class="form-signin form-group" id="vform"  method="POST" name ="login">
                              <h2 class="form-signin-heading">Please sign in</h2>
                              <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name"><br>
                              <input type="password" class="form-control" id="password" placeholder="Password" name="password"><br>
                              <button class="btn-block btn btn-primary btn-loading" id="subbutn" type="submit" value="submit" >
                                  Sign In</button>
                              <!--Sign in</button>-->
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="span2"></div>
      </div>
  </body>
</html>