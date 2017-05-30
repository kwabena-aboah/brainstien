<?php
	require('session.php');
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
<head><title>Profile</title></head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                  <ul>
                    <li class="color" style="list-style: none;"> <?php
						$result = mysql_query("SELECT * FROM members WHERE member_id='$userid'");
						while($row = mysql_fetch_array($result))
						  {
						  echo  $row["FirstName"];
						  echo"  ";
						  echo $row["LastName"];

						  }
						?>
						</li>
						<li style="list-style: none;">
						<div class="information">
					    <?php
						$result = mysql_query("SELECT * FROM members WHERE member_id='$userid'");
						while($row = mysql_fetch_array($result))
						  {
						  echo "Lives in: "."".$row['Address']. " | " ."Gender: ".$row['Gender']. " | " ."Born on: ".$row['Birthdate'];
						  echo "</br>";
						  echo "Contact No: "."".$row['ContactNo']. " | " ."Email: ".$row['Url'];
						  echo "</br>";
						   echo "Status: "."".$row['Stats'];
						  
						  }
						?></div>
						</li>
						
                  </ul>
                </div>
              </div><br><br>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Profile Wall</h3>
                    </div>
                    <div class="panel-body">
	                  <form name="form1" method="post" action="comment.php" class="form">
	                  <div class="form-group" >
	                   <textarea name="message" class="form-control" placeholder="Write on the wall"></textarea>
	                  </div>
	                  <input name="name" type="hidden" id="name" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>" class="form-control"/>
	                  <input name="poster" type="hidden" id="name" value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>" class="form-control"/>
	                  <input name="name1" type="hidden" id="name" value="<?php echo $_SESSION['SESS_LAST_NAME'];?>" class="form-control"/>
	                  <input type="submit" name="btnlog" value="Post" class="btn btn-default">
	                  <div class="pull-right">
	                  </div>
	                </form>
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
                <h3 class="panel-title"> </h3>
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
				
				echo '<font color="red">' . $numberOfRows . '</font>'; 
				?>)	</a>
				</li>
				</ul>
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

<section> 
    <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-body">
			  <div class="s"> 
			   <?php
					$query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM comment WHERE member_id='$userid' ORDER BY comment_id DESC";
					$result = mysql_query($query);
					while($row = mysql_fetch_assoc($result))
					{
					   echo '<div class="information">';
						echo '<div class="pic1">';
								$result1 = mysql_query("SELECT * FROM members WHERE member_id='$userid'");
					while($row1 = mysql_fetch_array($result1))
					  {
						echo "<img width=40 height=40 alt='Unable to View' src='" . $row1["profImage"] . "'>";
						}
						echo '<div class="message">';
						
							$result1 = mysql_query("SELECT * FROM members WHERE member_id='$userid'");
					while($row1 = mysql_fetch_array($result1))
					  {


					  echo " Posted by:<font color=#1d3162> {$row1['FirstName']}"."&nbsp;{$row1["LastName"]}</font>";
					  }
						
						
						echo '</br>';
						echo "{$row['comment']}";

						echo'</br>';
						echo'</br>';
						echo'</div>';
						echo'<hr width="390">';
						echo '<div class="kkk">';
						echo'<a class="style" href="deletepost.php?id=' . $row["comment_id"] . '">delete</a>&nbsp;&nbsp;<a class="style" href="like.php?id=' . $row["comment_id"] . '"><img width=20 height=20  src=img/like.png>Like</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						
						$days = floor($row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
						if($days > 0)
								echo date('F d Y', $row['date_created']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
						echo'</div>';
						echo'</br>';
						echo'</br>';
						}

					  echo '</div>';
					  echo'</br>';
					 
					  ?>
				 </div>
			</div>
        </div>
      </div>
     </div>
    </div>
  </section>


		 

</body>
</html>