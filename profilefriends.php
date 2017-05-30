  <?php
	require_once('session.php');
	include("function.php");
		$userid = $_GET['id'];
?>

<html>
<script type="text/javascript">

<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<head><title>search</title></head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/connectify.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
		
   });
      });
   </script>
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
            <li>
                <div class="righttop1 navbar-inverse">
                   <div class="search">
                  <form action="search.php" method="POST" class="form">
                    <input name="search" type="text" maxlength="30" class="textfield form-control"  value="search"/>
                  </form>
              </div>
            </li>
            <li><a href="profile.php" >
                <?php
                 include('connect.php');
                    $result = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
                    while($row = mysql_fetch_array($result)){
                  echo "<img width=20 height=15 alt='Unable to View' src='" . $row["profImage"] . "'>";
                    echo"  ";
                  echo $row["FirstName"];
                  echo"  ";
                  echo $row["LastName"];
                }
            ?>  
            </a>
        </li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="profile">
              <div class="row">
                <div class="col-md-8">
                  <ul class="panel-body">
					<?php
						$result = mysql_query("SELECT * FROM members WHERE member_id='$userid'");
						while($row = mysql_fetch_array($result))
						  {
						  echo  $row["FirstName"];
						  echo"  ";
						  echo $row["LastName"];

						  }
						?>
						<div class="information">
						<form method="post" action="" class="form">
						<?php
						$member_id = $_SESSION['SESS_MEMBER_ID'];
						$post = mysql_query("SELECT * FROM members WHERE member_id = '$userid'")or die(mysql_error());
						$row = mysql_fetch_array($post); 
						?>
						<div class="color"><h2><?php echo $row['FirstName']." ".$row['LastName'];?></h2></div>
						<div  class="ball"><h3 id="h2">&nbsp;Education</h3></div>
						</br><div class="information"><font color="#0e1641"><b>College:</b></font>
						</br><div class="information"><?php echo $row['college'];?></div> <hr width="650">
						
						</br><font color="#0e1641"><b>High School:</b></font>
						</br><div class="information"><?php echo $row['highschool'];?></div> <hr width="650">
						
						<div  class="ball"><h3 id="h2">&nbsp;Basic Information</h3></div>
						</br><div class="information"><font color="#0e1641"><b>About You:</b></font> 
						<div class="information"><?php echo $row['aboutme'];?></div><hr width="650">
						
						</br><font color="#0e1641"><b>Address:</b></font> 
						<div class="information"><?php echo $row['Address'];?></div><hr width="650">
						
						</br><font color="#0e1641"><b>Interested In:</b></font>
						<div class="information"><?php echo $row['Interested'];?></div><hr width="650">
						
						 </br><font color="#0e1641"><b>Gender:</b></font>
						<div class="information"><?php echo $row['Gender'];?></div><hr width="650">
						
						
						</br><font color="#0e1641"><b>BirthDate:</b></font>
						<div class="information"><?php echo $row['Birthdate'];?></div><hr width="650">
						
						</br><font color="#0e1641"><b>Language:</b></font>
						<div class="information"><?php echo $row['language'];?></div><hr width="650">
						
						 <div  class="ball"><h3 id="h2">&nbsp;Contact Information</h3></div>
						  </br><div class="information"><font color="#0e1641"><b>Email Address:</b></font>
						  <div class="information"><?php echo $row['Url'];?></div><hr width="650">
					</form>
					</div>
                  </ul>
                </div>
              </div><br><br>
             
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">Profile Picture</h3>
              </div>
              <div class="panel-body">
					<?php
						include('connect.php');
						$member_id = $_SESSION['SESS_MEMBER_ID'];
						$post = mysql_query("SELECT * FROM members WHERE member_id = '$userid'")or die(mysql_error());
						$row = mysql_fetch_array($post); 

					?>
					<img src="<?php echo $row['profImage'];?>" alt="" height="140"  width="140" border="0" class="left_bt" />
                <div class="clearfix"></div>
              </div>
            </div>
            
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Friend Profile</h3>
              </div>
              <div class="panel-body">
              	<li style="list-style: none;"><a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
				</li>
				<li style="list-style: none;">
				<?php $id = $row['member_id'];
					echo "<a href='profilefriends.php?action=view&id=".$id."'><img src=img/message.png width=17 height=17 border=0 />"."&nbsp;&nbsp;Info"."</a>"  ?>
				</li>	
				<li style="list-style: none;"><?php $id = $row['member_id'];
					echo "<a href='friendsphoto.php?action=view&id=".$id."'><img src=img/photos.png width=17 height=17 border=0 />"."&nbsp;&nbsp;Photos"?>(<?php
					$result = mysql_query("SELECT * FROM photos WHERE member_id='$userid'");
	
					$numberOfRows = MYSQL_NUMROWS($result);	
	
					echo '<font color="red">' . $numberOfRows . '</font>'; ?>)	
				</li>
				<div class="friend">
				<ul id="sddm1">
				<li style="list-style: none;"><a href=""><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends
					(<?php
						$result = mysql_query("SELECT * FROM friends WHERE status='conf'");
				
						$numberOfRows = MYSQL_NUMROWS($result);	
						echo '<font color="Red">' . $numberOfRows. '</font>';
						?>)
					</a>
				</li>
				</ul>
              </div>
            </div>
        </div>
      </div>
    </section> 
  
</body>
</html>
  