<?php
session_start();
?>
<?php
$conn=mysqli_connect("localhost","root","","messman") or die("Connection Failed");
?>

<!DOCTYPE HTML>
<html>
<head>
<title>NITC MESS</title>
<link rel="stylesheet" href="../css/abc.css" />
<link rel="icon" type="image/jpg" href="../images/icon.jpg">
</head>
<body>
	<header id="header">
		<div class="inner">
        	<div class="dropdown">
			  <button class="dropbtn"><b>ACCOUNT</b></button>
				<div class="dropdown-content">
					<a onclick="document.getElementById('id01').style.display='block'">User</a>
					<a onclick="document.getElementById('id02').style.display='block'">Admin</a>
				</div>
			</div>
            <a href="../homepage.html">Home Page</a>
			<a href="feedback.php">Feedback</a>
			<a href="../blog.html">Know Us</a>
            <div id="id01" class="modal">
  				<form class="modal-content animate" action="mess_homepage.php" method="post">
    			<div class="imgcontainer">
      				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    	  			<img src="../images/user.png" alt="Avatar" class="avatar">
    			</div>
    			<div class="container">
      				<h3 align="center"><b></b></h3>
      				<input type="text" placeholder="Enter User Id" name="uname" required>
        		    <button type="submit" name="smba1">Login</button>
    			</div>
    			</form>
			</div>
            			<div id="id02" class="modal">
  				<form class="modal-content animate" action="mess_homepage.php" method="post">
    			<div class="imgcontainer">
      				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    	  			<img src="../images/admin.png" alt="Avatar" class="avatar">
    			</div>
    			<div class="container">
      				
      				<input type="text" placeholder="Enter Your Id" name="uname" required>
                   
      				<input type="password" placeholder="Enter Password" name="password" required>
        		    <button type="submit" name="smba">Login</button>
                </div>
    			</form>
			</div>
		</div>
	</header>
    
    <div id="banner">&nbsp;</div>
	<div id="featured">
		<div class="container">
			<h1 style="color:#af160e; font-size:50px">MESS MANAGEMENT SYSTEM</h1>
				<p style="color:#af160e; font-size:30px"><em><u>Overview</u></em></p>
				<p style="color:#af160e; font-size:20px">Mridanga is a mess management system that allows the hostel inmates to purchase goods from the mess extra's counter on credit basis. It scans the Student Identification number and opens an account for every inmate.Now the mess contractor can update each student's account with the purchases, clear his dues payed in cash or can create a final due list to send it to the hostel office. Mridanga allows the mess contractor(administrator) to maintain an inventory of the goods available in the mess, update the list with new items, delete out of stock items,update good's price.Mridanga automatically updates the stock inventory as soon as something is sold to the inmate.</p>
		</div>
	</div>
	<div id="extra" class="container">
			<center><h1 style="color:#a81b08"><i>Mess Schedule</i></h1></center>
			<center><h3 style="color:#a81b08">Srictly Stick To The Mess Timing</h3></center>
		<div id="three-column">
			<div class="boxA">
			    <div class="box">
					<h4 style="color:#a81b08">BREAKFAST TIME</h4>
            		<p style="color:#a81b08">8:00AM - 9:30AM</p>
				    <img src="../images/03.jpg" height="103" />
               	</div>
			</div>
			<div class="boxB">
				<div class="box">
					<h4 style="color:#a81b08">LUNCH TIME</h4>
                   	<p style="color:#a81b08">11:00AM - 1:30PM</p>
					<img src="../images/05.jpg" height="103" />
                </div>
			</div>
		</div>
        <div class="boxC">
			<div class="box">
				<h4 style="color:#a81b08">DINNER TIME</h4>
                <p style="color:#a81b08">6:45PM - 8:30PM</p>
				<img src="../images/0123.jpg" height="103" />
            </div>
		</div>
		<div class="boxC">
			<div class="box">
				<h4 style="color:#a81b08">SUPPER</h4>
            	<p style="color:#a81b08">4:00PM - 5:30PM</p>
		      	<img src="../images/047.png" height="103" />
    		</div>
		</div>
	</div>
</div>
</div>

	
	<!-- Footer -->
    	<br/><br/><footer id="footer">
	  	<p class="copyright" style="text-align:right">&copy;&nbsp;&nbsp;Copyright 2016&nbsp;&nbsp;&nbsp;<a href="../blog.html">Developed By:PRALASH</a></p>
	</footer>
	</body>
</html>


<?php
if(isset($_POST['smba1']))
{
	$a1=$_SESSION['uname']=$_POST['uname'];
	$qu="select * from inmate where iid='$a1'";
	$qu1=mysqli_query($conn,$qu);
	if(mysqli_num_rows($qu1)>0)
	{
		echo"<script>alert('Logged In')</script>";
	echo"<script>window.open('user1.php','_self')</script>";
	}
	else
	{
		echo"<script>alert('Student Not Found')</script>";
	}
	
}
if(isset($_POST['smba']))
{
	
	$a= $_SESSION['uname']=$_POST['uname'];
	$b=$_POST['password'];
	
	$q1="select * from admin where username='$a' and password='$b'";
	$q2=mysqli_query($conn,$q1);
	if(mysqli_num_rows($q2)>0)
	{
	 echo "<script>alert('Logged In ')</script>";
	 echo "<script>window.open('admin.php','_self')</script>";
	 
	}
	else
	{
		echo "<script>alert('Log In Failed')</script>";
	}
	
	
	}
?>