<?php
$conn=mysqli_connect("localhost","root","","messman") or die("Connection Failed");
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>NITC MESS</title>
  <link rel="stylesheet" href="../css/feedback_css.css">
  <link rel="icon" type="image/jpg" href="../images/icon.jpg">
</head>

<body bgcolor="#f9e9c7">
<div id="content">
    <center><h1 style="color:#000"><b>Feedback Form</b></h1></center><a href="mess_homepage.php"><button class="button">Back</button></a></br>
    <form action="feedback.php" method="post"></br>
		<b>Name</b><span class="required"> * </span><input type="text" name="username" id="username" required placeholder="Your Name" /></br>
		<b>E-mail address</b><span class="required"> * </span><input type="email" name="usermail" id="usermail" placeholder="I promise I hate spam too!" required /></br>
        <b>Roll No.</b><span class="required"> * </span><input type="text" name="roll" id="usersite" placeholder="Your Roll No." /></br>
		<b>Subject</b><span class="required"> * </span><input type="text" name="subject" id="subject" placeholder="What would you like to talk about?" /></br>
		<b>Description</b><span class="required"> * </span><textarea name="desc" placeholder="Your message here and I'll answer as soon as possible " required></textarea></br>
		<p class="indication" style="text-align:right"><b>Fields with</b>
            <span class="required"> * </span><b>are required</b>
		</p>
        <button class="button" type="submit" name="submit">Send Feedback</button>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	$a=$_POST['username'];
	$a1=$_POST['usermail'];
	$a2=$_POST['roll'];
	$a3=$_POST['subject'];
	$a4=$_POST['desc'];
	$aa="insert into feedback values('$a2','$a','$a1','$a3','$a4')";
	$aa1=mysqli_query($conn,$aa);
	if($aa1)
	{
		echo"<script>alert('Thank You For Your Valuable FEEDBACK, We Will Get Back To You Soon')</script>";
		}
	
	}
	?>
