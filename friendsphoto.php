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
<head><title>Photos</title></head>
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
<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
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
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Wall</h3>
              </div>
              <div class="panel-body">
                <div class="photos">
					<?php
					$member_id = $_SESSION['SESS_MEMBER_ID'];
					$result = mysql_query("SELECT * FROM photos WHERE member_id='$userid'  ORDER BY photo_id DESC");

					while($row = mysql_fetch_array($result))
					  {

					 echo "<a href=".$row['location']." rel=example_group><img class=img width=100 height=100 alt='Unable to View' src='". $row["location"] . "'>" . '</a>';

					  echo"&nbsp;&nbsp";
					 
					  }

					mysql_close($con);
					?>
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
                <div class="clearfix"></div>
              </div>
            </div>

            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">Friends You may Know</h3>
              </div>
              <div class="panel-body">
                <?php
							
					
						$member_id=$userid;							
						$post = mysql_query("SELECT * FROM friends WHERE status = 'conf' ")or die(mysql_error());
						
						$num_rows  =mysql_numrows($post);
					
					if ($num_rows != 0 ){

						while($row = mysql_fetch_array($post)){

						$myfriend = $row['member_id'];
						$member_id=$userid;
						
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
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


</body>
</html>