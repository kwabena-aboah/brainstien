<?php
	require('session.php');
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
<head><title>Message</title></head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />
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
                
              </div><br><br>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Sent Messages</h3>
                    </div>
                    <div class="panel-body">
              	<div class="valentines">Message Sent</div>
                    </div>
                  </div>
                </div>
              </div>
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
					$id= $_SESSION['SESS_MEMBER_ID'];	
					$image=mysql_query("SELECT * FROM members WHERE member_id='$id'");
					$row=mysql_fetch_assoc($image);
					$_SESSION['image']= $row['profImage'];
					echo '<div id="pic">';
					echo "<a href=".$row['profImage']." rel=facebox;><img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
					echo '</div>';

				?>
                <div class="clearfix"></div>
              </div>
            </div>
            
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title"> </h3>
              </div>
              <div class="panel-body">
              		<li style="list-style: none;"><a href="editpic.php"><img src="img/pencil.png" width="17" height="17" border="0" /> &nbsp;Change Picture</a>
							</li>
							<li style="list-style: none;"><a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
							</li>
							<li style="list-style: none;"><a href="info.php"><img src="img/message.png" width="16" height="12" border="0" /> &nbsp;Info</a>
							</li>
							<li style="list-style: none;"><a href="photos.php"><img src="img/photos.png" width="16" height="12" border="0" /> &nbsp;Photos(<?php
						$result = mysql_query("SELECT * FROM photos WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
							
							$numberOfRows = MYSQL_NUMROWS($result);	
							
							echo '<font color="red">' . $numberOfRows . '</font>'; 
							?>)	</a>
							</li>
							<li style="list-style: none;"><a href="request.php"><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends Request
							(<?php 
											
								$member_id=$_SESSION['SESS_MEMBER_ID'];
								$seeall=mysql_query("SELECT * FROM friends WHERE friends_with='$member_id' AND status='unconf'") or die(mysql_error());
								$numberOFRows=mysql_numrows($seeall);
								echo '<font color="red">'.$numberOFRows.'</font>';?>)
								</a>
							</li>
							<li style="list-style: none;"><a href="message.php"><img src="img/m.png" width="16" height="12" border="0" /> &nbsp;Message&nbsp(<?php 
							$member_id = $_SESSION['SESS_MEMBER_ID'];
							$received = mysql_query("SELECT * FROM messages WHERE recipient = '$member_id'")or die(mysql_error());
							$receiveda = mysql_numrows($received);
							echo '<font color="Red">'  .$receiveda .'</font>';


							?>)
								</a>
							</li>
							</ul>
							<div class="friend">
							<ul id="sddm1">
							<li style="list-style: none;"><a href=""><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends
							
							(<?php


						$result = mysql_query("SELECT * FROM friends WHERE  friends_with = '$id' and  member_id!= '$id' and status = 'conf'    OR member_id = '$id' and friends_with != '$id' and status = 'conf' ");
							
							$numberOfRows = MYSQL_NUMROWS($result);	
							echo '<font color="Red">' . $numberOfRows. '</font>';
							?>)
							</a>
							</li>
							</ul>
							<ul id="sddm1">
						  <?php
													
													
							$member_id=$_SESSION['SESS_MEMBER_ID'];							
							$post = mysql_query("SELECT * FROM friends WHERE friends_with = '$id' and  member_id!= '$id' and status = 'conf'    OR member_id = '$id' and friends_with != '$id' and status = 'conf'  ")or die(mysql_error());
							

							$num_rows  =mysql_numrows($post);

							if ($num_rows != 0 ){

							while($row = mysql_fetch_array($post)){

							$myfriend = $row['member_id'];
							$member_id=$_SESSION['SESS_MEMBER_ID'];
							
								if($myfriend == $member_id){
								
									$myfriend1 = $row['friends_with'];
									$friends = mysql_query("SELECT * FROM members WHERE member_id = '$myfriend1'")or die(mysql_error());
									$friendsa = mysql_fetch_array($friends);
								
									echo '<li> <a href=friendprofile.php?id='.$friendsa["member_id"].' style="text-decoration:none;"><img src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';
									
								}else{
									
									$friends = mysql_query("SELECT * FROM members WHERE member_id = '$myfriend'")or die(mysql_error());
									$friendsa = mysql_fetch_array($friends);
									
								echo '<li> <a href=friendprofile.php?id='.$friendsa["member_id"].' style="text-decoration:none;"><img src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';
									
								}
							}
							}else{
								echo 'You don\'t have friends </li>';
							}


						?>
              </div>
            </div>
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">People You May Know</h3>
              </div>
              <div class="panel-body">
              <br>
              <?php
		
				$id = $_SESSION['SESS_MEMBER_ID'];
				$post = mysql_query("SELECT * FROM members WHERE member_id != '$id' LIMIT 0,3")or die(mysql_error());
				while($row = mysql_fetch_array($post)){
					echo '
					<ul id="sddm11">
					<li>
						<a href="friendprofile.php?id='.$row['member_id'].'"><img class="img" src="'.$row['profImage'].'" alt="" height="40" width="40" " />
						<font color="#1d3162">'.$row['FirstName']." ".$row['LastName'].'</font>
						</br>
					
						<a href="addfriend.php?id='.$row['member_id'].'" rel="facebox"style="text-decoration:none;"  >Add as Friend</a></p>
						<hr width=200>
						</ul>
					</li>';
					
				}
			?>
              </div>
              

          </div>
        </div>
      </div>
    </section>

</body>
</html>