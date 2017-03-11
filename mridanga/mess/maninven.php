<?php
session_start();
if(!$_SESSION['uname'])
{
	header('location:mess_homepage.php ?error=You Are Not Admin');
}
?>
<?php
$conn=mysqli_connect("localhost","root","","messman") or die("Connection Failed");
?>
<?php
if(isset($_POST['as']))
{
	$s=$_POST['sid'];
	$s1=$_POST['sname'];
	$s2=$_POST['squan'];
	$s3=$_POST['sprice'];
	$ck="select * from stocks where sid='$s'";
	$ck1=mysqli_query($conn,$ck);
	if(mysqli_num_rows($ck1)>0)
	{
		echo"<script>alert('ITEM ALREADY IN STOCK')</script>";
	}
	else{
	$ab="insert into stocks values('$s','$s1','$s2','$s3')";
	$ab1=mysqli_query($conn,$ab);
	
	if($ab)
	{
		echo"<script>alert('ITEM ADDED ')</script>";
	}
	}
}

if(isset($_POST['us']))
{
	$us=$_POST['usid'];
	$us2=$_POST['uquan'];
	$us3=$_POST['uprice'];
	$ck="select * from stocks where sid='$us'";
	$ck1=mysqli_query($conn,$ck);
	if(mysqli_num_rows($ck1)>0)
	{
		$ab="update stocks set squan='$us2',sprice='$us3' where sid='$us'";
	$ab1=mysqli_query($conn,$ab);
	if($ab)
	{
		echo"<script>alert('ITEM UPDATED ')</script>";
	}
	else{
		echo"<script>alert('ITEM CAN NOT BE UPDATED')</script>";
	}
		
	}
	else{
		echo"<script>alert('ERROR : ITEM NOT FOUND')</script>";
	}	
}
?>
<html>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="icon" type="image/jpg" href="../images/icon.jpg">
</head>
<body>
    <style>
	body{
		background-color:#f2efda;
	}
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
	
	#menu li:hover a, #menu li.active a, #menu li.active span
	{
		color: #2B3F48;
	}
	
	#menu .current_page_item a
	{
		border: 2px solid #693;
		background: #a81b08;
		border-radius: 5px;
		color: #FFF;
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
		line-height: 2.95em;
		min-width: 10em;
		text-align: center;
		text-decoration: none;
	}
	#footer {
		padding: 0em 1em ;
		background-color:#a81b08;
		text-align: center;
		border:double;
	}
	#footer .copyright {
		color:white;
		font-size: 0.9em;
	}
	#footer .copyright a {
		color:white;
	}
	#footer .copyright a:hover {
				color:blue;
	}
	</style>
	<section id="banner">
       	<div id="menu">
			<ul>
				<li class="current_page_item"><a href="logout.php">Logout</a></li>
				<li class="current_page_item"><a href="admin.php">Back</a></li>
                <li class="current_page_item"><a href="showst.php">Show Stocks</a></li>
			</ul>
		</div>
		<h1 align=center><b>Stock Section</b></h1>
        <img src="../images/stock.jpg" width="1000" height="336" />
   	</section>
<!--form action="maninven.php" method="post">
<input type="text" name="sid" placeholder="ITEM ID" required pattern="s[0-9]*">
<input type="text" name="sname" placeholder="ITEM Name" required>
<input type="text" name="squan" placeholder="ITEM Quantity" required>
<input type="text" name="sprice" placeholder="ITEM Price" required>
<input type="submit" name="as" value="Add Item">
</form-->
<form action="maninven.php" method="post">

	<table align="center" width="531" height="199" border="8" style="border-radius:20">
    	<tr height="50">
        	<td colspan="5" align="center" style="font-size:23px"><b>Add Item</b></td>
       	</tr>
        <tr height="30">
        	<td width="191" align="right"><b>Item Id:</b></td>
            <td width="298"><input type="text" name="sid" placeholder="Enter Item Id" required pattern="s[0-9]*"></td>
        </tr>
        <tr height="30">
         	<td align="right"><b>Item Name:</b></td>
            <td><input type="text" name="sname" placeholder="Enter Item Name" required></td>
        </tr>
        <tr height="30">
        	<td align="right"><b>Item Quantity:</b></td>
            <td><input type="text" name="squan" placeholder="Enter Item Quantity" required></td>
        </tr>
        <tr height="30">
         	<td align="right"><b>Item Price:</b></td>
            <td><input type="text" name="sprice" placeholder="Enter Item Price" required></td>
        </tr>
       	<tr height="30">
        	<td height="36" colspan="5" align="center"><button class="button" name="as">Add Item</button>
            <!--input type="submit" name="as" value="Add Student"--></td>
        </tr>
   	</table>
    
</form>
<form action="maninven.php" method="post">
	
      <table align="center" width="531" height="182" border="8" style="border-radius:20">
     		<tr height="50">
               	<td colspan="5" align="center" style="font-size:23px"><b>Update Item</b></td>
            </tr>
            <tr height="30">
            	<td width="191" align="right"><b>Item Id:</b></td>
                <td width="310"><input type="text" name="usid" placeholder="Enter Item ID" required pattern="s[0-9]*"></td>
            </tr>
            <tr height="30">
          		<td align="right"><b>Item Quantity:</b></td>
                <td><input type="text" name="uquan" placeholder="Enter Item Quantity" required></td>
            </tr>
            <tr height="30">
              	<td align="right"><b>Item Price:</b></td>
                <td><input type="text" name="uprice" placeholder="Enter Item Price" required></td>
            </tr>
            <tr height="30">
            	<td height="47" colspan="5" align="center"><button class="button" name="us">Update Item</button>
                <!--input type="submit" name="as" value="Add Student"--></td>
            </tr>
         </table>
  
</form>
<!-- Footer -->
    	<br/><footer id="footer">
	  	<p class="copyright" style="text-align:right">&copy;&nbsp;&nbsp;Copyright 2016&nbsp;&nbsp;&nbsp;<a href="#">Developed By:PRALASH</a></p>
	</footer>
</body>
</html>
