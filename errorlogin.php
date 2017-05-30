
<html>
<head>
<title>Login</title>
</head>
<style type="text/css">
<!--
body {
	background-image: url(bg/bg3.jpg);
	background-repeat:repeat-x;
	background-color:#d9deeb;

}
-->
</style>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/connectify.png" type="image" />
<link href="errorlogin.css" rel="stylesheet" type="text/css" />

	<style type="text/css">
<!--
@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
body{background-color:#ECF0F1;}
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
	font-family: 'Open Sans', sans-serif;
}
.navbar-inverse {
    background-color: #34495E;
    border-color: #34495E;
}

</style>
</body>

<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Home.php" style="color: white; font-size: 30px;">Conne<span style="background-color:#465783; color: yellow; font-size: 30px;">ctify</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


  
<div class="font">
<div class="right">
<form action="login.php" method="post" class="form">

<hr>
<table class="table" class="table">
<th>
<tr>
<td>Username:</td><td><input type="text" name="UserName" class="textright form-control" value=""/></td>
</tr>
</th>
<th>
<tr>
<td>Password:</td><td><input type="password" name="Password" class="textright form-control" value=""/></td>
</tr>
</th>
<th>
<tr>
<td></td><td><input type="submit" class="greenButton btn" name="OK" value="Login"/><a href="index.php" class="t"> or sign up for Connectify</a> </td>
</tr></th>

 </table>
</form>
</div>
</div>
</body>
</html>
 