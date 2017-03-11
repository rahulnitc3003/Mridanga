<?php
$conn=mysqli_connect("localhost","root","","messman") or die("Connection Failed");
?>
<?php
session_start();
if(!$_SESSION['uname'])
{
	header('location:mess_homepage.php ?error=You Are Not Admin');
}
?>
<?php
$a=$_SESSION['uname'];
$un="select fname,lname from inmate where iid='$a'";
$un1=mysqli_query($conn,$un);
$row=mysqli_fetch_array($un1);
?>
<?php
echo "<center><h1><font color='white'>Welcome $row[0] $row[1] [$a]</font></h1></center><br/><br/>";
?>
<html>
<head>
	<title>NITC MESS</title>
	<link rel="icon" type="image/jpg" href="../images/icon.jpg">
</head>
<body background="../images/plain-background.jpg">
    <style>
	#menu
	{
		position: absolute;
		top: 1.5em;
	}
	
	#menu ul
	{
		display: inline-block;
	}
	
	#menu li
	{
		display: block;
		float: left;
		text-align: center;
	}
	
	#menu li a, #menu li span
	{
		padding: 1em 1.5em;
		letter-spacing: 1px;
		text-decoration: none;
		text-transform: uppercase;
		font-size: 0.8em;
		color: #2B3F48;
	}
	#menu .current_page_item a
	{
		background-color: transparent;
		box-shadow: inset 0 0 0 2px #51BAA4;
		color: #51BAA4 !important;
		border-radius: 2.5em;
		cursor: pointer;
		display: inline-block;
		font-weight: 800;
		line-height: 1.95em;
		min-width: 7em;
		text-align: center;
		text-decoration: none;
	}
	#banner {
		max-width:1000px;
		margin:auto;
		background-color:white;
		border:double;
	}
	.button {
		background-color: transparent;
		box-shadow: inset 0 0 0 2px #51BAA4;
		color: #51BAA4 !important;
		border-radius: 2.5em;
		cursor: pointer;
		display: inline-block;
		font-weight: 800;
		line-height: 3.4em;
		min-width: 10em;
		text-align: center;
		text-decoration: none;
	}
	#footer {
		padding: 0em 1em;
		background-color:#d3c9c9;
		text-align: center;
		border:double;
	}
	#footer .copyright {
		color:#333;
		font-size: 0.9em;
	}
	#footer .copyright a {
		color:#333;
	}
	#footer .copyright a:hover {
				color:blue;
	}
	</style>
	<form action="user1.php" method ="post"><br/>	
	<section id="banner">
    	<div id="menu">
			<ul>
				<br/><li class="current_page_item"><a href="logout.php">Home</a></li>
				<button class="button" name="name">Transaction Details</button></li>
			</ul>
		</div>
   	    <img src="../images/user-page.jpg" width="1000" height="336" />
    </section>
	</form>
    
<?php
if(isset($_POST['name']))
{	
?>

<table align="center" width="900" border="" bordercolor="silver">
    	<tr>
        	<td colspan="30" align="center" bgcolor="white"><h1><font color="silver">Transaction Details</h1></td>
        </tr>
        <tr align="center">
        	<th style="height:40px"><font color="gold">Serial No.</th>
        	<!--th><font color="gold">Student ID</th!-->
        	<th><font color="gold">Item Name</th>
        	<th><font color="gold">Item Quantity</th>
        	<th><font color="gold">Rate</th>
            </tr>

<?php
$que = "select * from transact where iid='$a'";
		$run = mysqli_query($conn,$que);
		$i=1;
		while($row = mysqli_fetch_array($run))
		{
			$ab = $row[0];
			$ab1 = $row[1];
			$ab2 = $row[2];
			$ab3 = $row[3];
			$temp="select sname from stocks where sid='$ab1'";
			$temp2=mysqli_query($conn,$temp);
			$temp3=mysqli_fetch_array($temp2);
			
		?>	
         <tr align="center"> 
           	<td style="color:white"><?php echo $i; $i++; ?></td>
            <td style="color:white"><?php echo $temp3[0]; ?></td>
            <td style="color:white"><?php echo $ab2; ?></td>
			<td style="color:white"><?php echo $ab3; ?></td>
			 
       </tr>
<?php } 
$sum="select sum(rate) from transact where iid='$a'";
$sum1=mysqli_query($conn,$sum);
$sum2=mysqli_fetch_array($sum1);
?>
<tr align="center">
<td colspan="3"><i><font color="gold">TOTAL</td>
<td style="color:white"><b><?php echo $sum2[0];?></b></td>
</tr>		
<?php } ?>
        </table>
        	<!-- Footer -->
    	<br/><br/><br/><br/><br/><br/><br/><br/><br/><footer id="footer">
	  	<p class="copyright" style="text-align:right">&copy;&nbsp;&nbsp;Copyright 2016&nbsp;&nbsp;&nbsp;<a href="../blog.html">Developed By:PRALASH</a></p>
	</footer>
