<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <title>SIGN IN</title>
    <!-- Bootstrap -->
    <link href="./dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./dist/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="./dist/css/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="./dist/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script type="text/javascript" >
    function loadXMLDoc()
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
                document.getElementById("paneldiv").setAttribute('class',"panel panel-success" );
            }
        };
        xmlhttp.open("post","form_action_xml.php" ,true);
        xmlhttp.send();
}
    </script>
  </head>
  <body>
      <div class="container-fluid" >
          <div class="span1"></div>
          <div class="span8">
              <div class="panel panel-primary" id="paneldiv">
                  <div class="panel-heading"><h3>Simple XML response </h3></div>
                  <div class="panel-body">
                      <div class="span2 left">
                          <button  type="button" class="btn btn-default btn-sm" onclick="loadXMLDoc();">
                              <span class="glyphicon glyphicon-user"></span><h4>List of  all users</h4>
                          </button>
                      </div>
                      <div class="container span5 right" id="progressdiv"> </div>
                      <div class="container span5 right" id="tablediv">
                          <table>
                              <tr><th></th></tr>
                          </table>
                          <table class="table">

                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="container-fluid">
          <div class="span1"></div>
          <div class="span8">
              <div class="panel panel-primary" id="paneldiv">
                  <div class="panel-heading"><h3>Simple Form sign in </h3></div>
                  <div class="panel-body">
                      <div class="span2 left">
                          <button  type="button" class="btn btn-default btn-sm" onclick="loadXMLDoc();">
                              <span class="glyphicon glyphicon-user"></span><h4>List of  all users</h4>
                          </button>
                      </div>
                      <div class="container span3 right" id="formeediv">
                          <form class="form-signin">
                              <h2 class="form-signin-heading">Please sign in</h2>
                              <input type="text" class="input-block-level" placeholder="Email address">
                              <input type="password" class="input-block-level" placeholder="Password">
                              <button class="btn btn-large btn-primary" type="submit">Sign in</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script src="./js/jquery/jquery-1.4.1.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
  </body>
</html>