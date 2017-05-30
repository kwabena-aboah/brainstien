<?php include('connect.php');?>	
<?php

		//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
///
		$vfname = "";
		$vlname = "";
		$vlogin="";
		$vpassword="";
		$vcpassword="";
	    $vaddress="";
		$vcnumber="";
		$vemail="";

		$a="";
		$u="";
		$e="";
		
		
		
//

		$fname = "";
		$lname = "";
		$login="";
		$password="";
		$cpassword="";
	    $address="";
		$cnumber="";
		$email="";
		
if (isset($_POST['Submit'])) {
	
	//Sanitize the POST values
	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	$login =($_POST['login']);
	$password = md5($_POST['password2']);
	$cpassword = md5($_POST['cpassword']);
	$address = ($_POST['address']);
	$cnumber =($_POST['cnumber']);
	$email = ($_POST['email']);
	$gender = ($_POST['gender']);
	//$bdate = clean($_POST['bdate']);
	$propic = ($_POST['propic']);
	$bday=$_POST['month'];
  	
	$pattern = "/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i";
	//Input Validations
		
	if (!preg_match($pattern,$email)){
	$e = "Invalid Email Address";	
}

if ($email=="") {
		$e	= "";
		}
	if ($fname=="") {
		$vfname	= "<td>Field Missing.</td>";
		}else{
		$vfname="";
		}

	if ($lname==""){
	$vlname	= "<td>Field Missing.</td>";
		}else{
		$vlname="";
		}
	if ($login=="") {
	$vlogin	= "<td>Field Missing.</td>";
	} else{
	$vlogin = "";
	}
		if ($password=="") {
		$vpassword	= "<td>Field Missing.</td>";
	} else{
	$vpassword="";
	}
		if ($cpassword=="") {
		$vcpassword	= "<td>Field Missing.</td>";
	} else{
	$vcpassword="";
	}
	if ($address=="") {
	$vaddress	= "<td>Field Missing.</td>";
	} else{
	$vaddress="";
	}

			if ($cnumber=="") {
		$vcnumber= "<td>Field Missing.</td>";
	} else{
	$vcnumber="";
	}
	if ($email=="") {
		$vemail	= "<td>Field Missing.</td>";
	} else{
	$vemail="";
	}
	
	if($cpassword!=$password){
	$a="Password do not Match";}
	if ($cpassword==""){
	$a="";
	}

	
	//Check for duplicate login ID
	if($login != '') {
		$query = "SELECT * FROM members WHERE UserName='$login'";
		$result = mysql_query($query);
		if($result) {
			if(mysql_num_rows($result) > 0) {
			$u = 'UserName already in use';
			
			}
			@mysql_free_result($result);
		}
		else {
		
			die("Query failed");
		}
	}
	
	
	
	

if ($fname!= "" && $lname!= "" && $login!= "" && $password!= "" && $cpassword==$password && $address!="" && preg_match($pattern,$email) && $cnumber!="" ) {
		$link = mysql_connect("localhost", "root", "");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	
	}
	
	//Select database
	$db = mysql_select_db("db");
	if(!$db) {
		die("Unable to select database");
	}
				
		
				$query = mysql_query("INSERT INTO members(UserName, Password, FirstName, LastName, Address, ContactNo, Url, Birthdate, Gender, profImage,curcity)VALUES('$login','$password','$fname','$lname','$address','$cnumber','$email','$bday','$gender','$propic','$address')")or die(mysql_error());  
				header('Location: signup-success.php');
				echo "login success";
					
		}
	
	

}
?>
<html>
<head><title>index</title></head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500);

body {
  padding-top: 90px;
  background:#F7F7F7;
  color:#666666;
  font-family: 'Roboto', sans-serif;
  font-weight:100;
}

body{
  width: 100%;
  background: -webkit-linear-gradient(left, #22d686, #24d3d3, #22d686, #24d3d3);
  background: linear-gradient(to right, #22d686, #24d3d3, #22d686, #24d3d3);
  background-size: 600% 100%;
  -webkit-animation: HeroBG 20s ease infinite;
          animation: HeroBG 20s ease infinite;
}

@-webkit-keyframes HeroBG {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 100% 0;
  }
  100% {
    background-position: 0 0;
  }
}

@keyframes HeroBG {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 100% 0;
  }
  100% {
    background-position: 0 0;
  }
}


.panel {
  border-radius: 5px;
}
label {
  font-weight: 300;
}
.panel-login {
   border: none;
  -webkit-box-shadow: 0px 0px 49px 14px rgba(188,190,194,0.39);
  -moz-box-shadow: 0px 0px 49px 14px rgba(188,190,194,0.39);
  box-shadow: 0px 0px 49px 14px rgba(188,190,194,0.39);
  }
.panel-login .checkbox input[type=checkbox]{
  margin-left: 0px;
}
.panel-login .checkbox label {
  padding-left: 25px;
  font-weight: 300;
  display: inline-block;
  position: relative;
}
.panel-login .checkbox {
 padding-left: 20px;
}
.panel-login .checkbox label::before {
  content: "";
  display: inline-block;
  position: absolute;
  width: 17px;
  height: 17px;
  left: 0;
  margin-left: 0px;
  border: 1px solid #cccccc;
  border-radius: 3px;
  background-color: #fff;
  -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}
.panel-login .checkbox label::after {
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  top: 0;
  margin-left: 0px;
  padding-left: 3px;
  padding-top: 1px;
  font-size: 11px;
  color: #555555;
}
.panel-login .checkbox input[type="checkbox"] {
  opacity: 0;
}
.panel-login .checkbox input[type="checkbox"]:focus + label::before {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
.panel-login .checkbox input[type="checkbox"]:checked + label::after {
  font-family: 'FontAwesome';
  content: "\f00c";
}
.panel-login>.panel-heading .tabs{
  padding: 0;
}
.panel-login h2{
  font-size: 20px;
  font-weight: 300;
  margin: 30px;
}
.panel-login>.panel-heading {
  color: #848c9d;
  background-color: #e8e9ec;
  border-color: #fff;
  text-align:center;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
  border-bottom: 0px;
  padding: 0px 15px;
}
.panel-login .form-group {
  padding: 0 30px;
}
.panel-login>.panel-heading .login {
  padding: 20px 30px;
  border-bottom-leftt-radius: 5px;
}
.panel-login>.panel-heading .register {
  padding: 20px 30px;
  background: #2d3b55;
  border-bottom-right-radius: 5px;
}
.panel-login>.panel-heading a{
  text-decoration: none;
  color: #666;
  font-weight: 300;
  font-size: 16px;
  -webkit-transition: all 0.1s linear;
  -moz-transition: all 0.1s linear;
  transition: all 0.1s linear;
}
.panel-login>.panel-heading a#register-form-link {
  color: #fff;
  width: 100%;
  text-align: right;
}
.panel-login>.panel-heading a#login-form-link {
  width: 100%;
  text-align: left;
}

.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
  height: 45px;
  border: 0;
  font-size: 16px;
  -webkit-transition: all 0.1s linear;
  -moz-transition: all 0.1s linear;
  transition: all 0.1s linear;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-bottom: 1px solid #e7e7e7;
  border-radius: 0px;
  padding: 6px 0px;
}
.panel-login input:hover,
.panel-login input:focus {
  outline:none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  border-color: #ccc;
}
.btn-login {
  background-color: #E8E9EC;
  outline: none;
  color: #2D3B55;
  font-size: 14px;
  height: auto;
  font-weight: normal;
  padding: 14px 0;
  text-transform: uppercase;
  border: none;
  border-radius: 0px;
  box-shadow: none;
}
.btn-login:hover,
.btn-login:focus {
  color: #fff;
  background-color: #2D3B55;
}
.forgot-password {
  text-decoration: underline;
  color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
  text-decoration: underline;
  color: #666;
}

.btn-register {
  background-color: #E8E9EC;
  outline: none;
  color: #2D3B55;
  font-size: 14px;
  height: auto;
  font-weight: normal;
  padding: 14px 0;
  text-transform: uppercase;
  border: none;
  border-radius: 0px;
  box-shadow: none;
}
.btn-register:hover,
.btn-register:focus {
  color: #fff;
  background-color: #2D3B55;
}


}
-->
</style>
<link rel="icon" href="img/connectify.png" type="image" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
	<link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../css/example.css" media="screen" rel="stylesheet" type="text/css" />
			<script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
			<script type="text/javascript">

jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
  	closeImage   : " ../src/closelabel.png" 
})
</script>

<script type="text/javascript" src="js/jquery.js"></script>
<!--datepicker -->
<link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
<!--datepicker -->
<script type="text/javascript" charset="utf-8">
jQuery(function($){
$(".date").datepicker();
});
</script>

<body>

<div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                <h2>LOGIN</h2>
                  <div class="form-group">
                    <input type="text" name="UserName" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="Password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="col-xs-6 form-group pull-left checkbox">
                    <input id="checkbox1" type="checkbox" name="remember">
                    <label for="checkbox1">Remember Me</label>   
                  </div>
                  <div class="col-xs-6 form-group pull-right">     
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                  </div>
              </form>

              <form id="register-form" method="POST" action="index.php" role="form" style="display: none;">
                <h2>REGISTER</h2>
                  <div class="form-group">
                  <input name="fname" type="text" class="form-control" placeholder="First Name" maxlength="10" id="username" value="<?php echo $fname; ?>"/><font color="Red"><?php echo $vfname; ?> </font>
                  </div>
                  <div class="form-group">
                  <input name="lname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>"/><font color="Red"><?php echo $vlname; ?> </font>
                  </div>
                  <div class="form-group">
                  <input name="login" type="text" class="textfield" placeholder="Username" value="<?php echo $login; ?>"/><font color="Red"><?php echo $vlogin; ?> </font><font color="Red"> <?php echo $u; ?></font>
				          </div>
                  <div class="form-group">
                    <input name="password2" type="password" id="password" placeholder="Password" class="form-control" value="<?php echo $password; ?>"/><font color="Red"><?php echo $vpassword; ?> </font>
                  </div>
                  <div class="form-group">
                    <input name="cpassword" type="password" placeholder="Confirm Password" class="form-control" value="<?php echo $cpassword; ?>"/><font color="Red"><?php echo $vcpassword; ?> </font>
                  </div>
          				<div class="form-group">
          					<input name="address" type="text" class="form-control" placeholder="Address" value="<?php echo $address; ?>"/><font color="Red"><?php echo $vaddress; ?> </font>
          				</div>
          				<div class="form-group">
          					<input name="cnumber" type="text" class="form-control" plceholder="Contact Number" maxlength="11" size="40" value="<?php echo $cnumber; ?>" /><font color="Red"><?php echo $vcnumber; ?> </font>
          					<input name="propic" id="dadded" type="hidden" value="upload/p.jpg" />
          				</div>
          				<div class="form-group">
          				<input name="email" type="text" placeholder="Email" class="form-control" value="<?php echo $email; ?>"><font color="Red"><?php echo $vemail; ?> </font><font color="Red"><?php echo $e; ?> </font>
          				</div>
          				<div class="form-group">
          					<div class="input-container">
          					  <select name="gender" id="gender" class="form-control"><?php echo $vgender; ?> 
          		                <option >Female</option>
          		                <option >Male</option>
          		              </select><br />
          					</div>
          				</div>
          				<div class="form-group">
          					<input name="month" type="text" class="date form-control">
          				</div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="Submit" id="Submit" tabindex="4" class="form-control btn btn-register" value="Sign Up">
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6 tabs">
              <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
            </div>
            <div class="col-xs-6 tabs">
              <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
	$(function() {
    $('#login-form-link').click(function(e) {
    	$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

})
</script>
</body>
</html>
