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
  $('document').ready(function(){
      $('#vform').submit(function(){
          $.ajax({
                type: 'POST',
                async: 'true',
                url: 'login.php',
                data: {
                    name: $('#name').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    alert(response);
                    if (response == '1') {
                        alert('Log In Success');
                    }
                    else if (response == '2') {
                        alert('Incorrect Details');
                    }
                    else if (response == '3') {
                        alert('Fill In All Fields');
                          }
                      }
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
                  <div class="panel-heading"><h3>Simple Form sign in </h3></div>
                  <div class="panel-body">
                      <!--                      <div class="span2 left">
                                                <button  type="button" class="btn btn-default btn-sm" onclick="loadXMLDoc();">
                              <span class="glyphicon glyphicon-log-in"></span><h4>List of  all users</h4>
                          </button>
                        </div>-->
                      <div class="container span3 right"  id="formeediv">
                          <form class="form-signin" id="vform"  method="POST" name ="login">
                              <h2 class="form-signin-heading">Please sign in</h2>
                              <input type="text" class="input-block-level" id="name" placeholder="Enter your name" name="name">
                              <input type="password" class="input-block-level" id="password" placeholder="Password" name="password">
                              <button class="btn btn-large btn-primary"  type="submit" value="submit" >Sign in</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="span2"></div>
      </div>
  </body>
</html>