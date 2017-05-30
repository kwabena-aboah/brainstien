<?php
	require_once('session.php');
?>

<html>

<script src="jquery.js" type="text/javascript"></script>

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
<head><title>Home</title></head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />

<link rel="icon" href="img/connectify.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>


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
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Wall</h3>
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
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">Profile Picture</h3>
              </div>
              <div class="panel-body">
                <div class="propic">
                <?php
                    $id= $_SESSION['SESS_MEMBER_ID'];   
                    $image=mysql_query("SELECT * FROM members WHERE member_id='$id'");
                    $row=mysql_fetch_assoc($image);
                    $_SESSION['image']= $row['profImage'];
                    echo '<div id="pic">';
                    echo "<a href=".$row['profImage']." rel=facebox;><img width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
                    echo '</div>';
                ?>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


 	<section> 
    <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default post">
              <div class="panel-body">
	   <?php
  			$query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM comment WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."' ORDER BY comment_id DESC";
			$result = mysql_query($query);
			while($row = mysql_fetch_assoc($result)){
   				echo '<div class="information">';
				echo '<div class="pic1">';
				$result1 = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
				while($row1 = mysql_fetch_array($result1)){
				echo "<img width=40 height=40 alt='Unable to View' src='" . $row1["profImage"] . "'>";
			}
			echo '<div class="message">';
	
			$result1 = mysql_query("SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
			while($row1 = mysql_fetch_array($result1)){
 				echo " Posted by:<font color=#1d3162> {$row1['FirstName']}"."&nbsp;{$row1["LastName"]}</font>";
  			}
			echo '</br>';
			echo "{$row['comment']}";

			echo'</br>';
			echo'</br>';
			echo'</div>';
			echo'<hr width="390">';
			echo '<div class="kkk">';
			
			echo'<a class="style" href="deletepost.php?id=' . $row["comment_id"] . '">delete</a>';
			echo'<a class="style" href="like.php"><img width=20 height=20  src=img/like.png>Like</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			
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
    </section>

</body>
</html>