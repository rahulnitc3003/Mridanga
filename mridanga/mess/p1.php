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

<html>
<head>
  <meta charset="UTF-8">
  <title>NITC MESS</title>
  <link rel="icon" type="image/jpg" href="../images/icon.jpg">
</head>
<body>
<style>
	body{
		background-color:#f2efda;
	}
/*-----------------Menu------------*/
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
/*-----------Banner---------------*/
#banner {
	max-width:1000px;
	margin:auto;
	background-color:white;
	border:double;
}
/*-----------Button------------*/
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
<!-- Banner -->
		<section id="banner">
        	<div id="menu">
				<ul>
					<li class="current_page_item"><a href="logout.php">Logout</a></li>
					<li class="current_page_item"><a href="admin.php">Back</a></li>
				</ul>
			</div>
			<h1 align=center><b>Payment Section</b></h1>
            <img src="../images/pay.jpg" width="1000" height="336" />
        </section><br/>
	



		<form method="post" action="p1.php">
        	<table align="center" width="439" height="100" border="10" style="border-radius:20">
            	<tr height="50">
                	<td colspan="5" align="center" style="font-size:23px"><b>MAKE PAYMENT</b></td>
                </tr>
                <tr height="30">
                	<td width="168" align="right"><b>Inmate Id:</b></td>
                    <td width="265"><input type="text" name="iid" placeholder="Inmate Id" required="required"></td>
                </tr height="30">
                 <tr height="30">
                	<td width="168" align="right"><b>Amount:</b></td>
                    <td width="265"><input type="text" name="am" placeholder="Amount" required="required"></td>
                </tr height="30">
                <tr height="30">
                	<td colspan="5" align="center"><!--input type="submit" name="as" value="Pay"-->
                    <button class="button" name="as">Pay</button>
                    </td>
               	</tr>
            </table>
		</form>
        	<!-- Footer -->
    	<br/><footer id="footer">
	  	<p class="copyright" style="text-align:right">&copy;&nbsp;&nbsp;Copyright 2016&nbsp;&nbsp;&nbsp;<a href="#">Developed By:PRALASH</a></p>
	</footer>

</body>
</html>

<?php
if(isset($_POST['as']))
{
	$t1=$_POST['iid'];
	$t2=$_POST['am'];
	$ab="select * from inmate where iid='$t1'";
	$ab1=mysqli_query($conn,$ab);
	if(mysqli_num_rows($ab1)>0)
	{
		$ck="select dues from inmate where iid='$t1'";
	$ck2=mysqli_query($conn,$ck);
	$ck3=mysqli_fetch_array($ck2);
	if($t2==$ck3[0])
	{
		$up="update inmate set dues=0 where iid='$t1'";
		$up2=mysqli_query($conn,$up);
		$upt="delete from transact where iid='$t1'";
		$upt2=mysqli_query($conn,$upt);
		echo"<script>alert('DUES CLEARED')</script>";
		}
		else
		{
			echo"<script>alert('Only Exact Ammount Accepted')</script>";
			}
	
	 }
else{
	echo"<script>alert('ERROR : Student not Found')</script>";
}}
	
	?>