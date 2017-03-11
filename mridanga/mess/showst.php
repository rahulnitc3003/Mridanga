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
<body background="../images/plain-background.jpg">
<style>
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
</body>
</html>

<table align="center" width="900" border="" bordercolor="silver">
    	<tr>
        	<td colspan="30" align="center" bgcolor="white"><h1>STOCKS</h1>
            <a href="admin.php"><button class="button">Back</button></a>
            <a href="logout.php"><button class="button">Logout</button></a>
            </td>
        </tr>
        <tr align="center">
        	<th height="50"><font color="gold">Serial No.</th>
        	<th><font color="gold">Stock ID</th>
        	<th><font color="gold">Item</th>
        	<th><font color="gold">Quantity</th>
        	<th><font color="gold">Price</th>
            </tr>

<?php
$que = "select * from stocks order by 1 DESC";
		$run = mysqli_query($conn,$que);
		$i=1;
		while($row = mysqli_fetch_array($run))
		{
			$ab = $row[0];
			$ab1 = $row[1];
			$ab2 = $row[2];
			$ab3 = $row[3];
			
		?>	
         <tr align="center"> 
           	<td style="color:#FFF"><?php echo $i; $i++; ?></td>
            <td style="color:#FFF"><?php echo $ab; ?></td>
            <td style="color:#FFF"><?php echo $ab1; ?></td>
            <td style="color:#FFF"><?php echo $ab2; ?></td>
			<td style="color:#FFF"><?php echo $ab3; ?></td>
			 
       </tr>
		<?php } ?>
        </table>

        <!-- Footer -->
    	<br/><footer id="footer">
	  	<p class="copyright" style="text-align:right">&copy;&nbsp;&nbsp;Copyright 2016&nbsp;&nbsp;&nbsp;<a href="#">Developed By:PRALASH</a></p>
	</footer>
