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
</style>
</body>
</html>

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
<title>Welcome to Counter</title>
</head>
<body>
<?php
$a=@$_GET['va'];
$un="select fname,lname from inmate where iid='$a'";
$un1=mysqli_query($conn,$un);
$row=mysqli_fetch_array($un1);


echo "<font style='color:gold'><center><h1>Welcome $row[0] $row[1] [$a]</center></font>";


?>

<table align="center" width="900" border="" bordercolor="silver">
    	<tr>
        	<td colspan="30" align="center" bgcolor="white"><h1>COUNTER</h1>
        	<a href="inventory1.php"><button class="button">Back</button></a>
            <a href="logout.php"><button class="button">Logout</button></a>
            <a href="admin.php"><button class="button">Home</button></a>
        </tr>
        <tr align="center">
        	<th height="50"><font color="gold">Serial No.</th>
        	<th><font color="gold">ITEM ID</th>
        	<th><font color="gold">ITEM NAME</th>
        	<th><font color="gold">ITEM QUANTITY</th>
        	<th><font color="gold">ITEM PRICE</th>
        	<th><font color="red">BUY</th>
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
			 <td><a  style="color:gold"href="inventory.php?buyy=<?php echo $ab; ?>&va=<?php echo $a; ?>"><button class="button">BUY</button></a></td>
       </tr>
		<?php } ?>
        </table>

        </table>
<?php
$getbuy = @$_GET['buyy'];


if(isset($getbuy))
{
	
	$qc="select squan from stocks where sid='$getbuy'";
	$qc1=mysqli_query($conn,$qc);
	$qc2=mysqli_fetch_array($qc1);
	$qc3=$qc2[0];
	
	if($qc3==0)
	{
		echo"<script>alert('You Can Not Buy This Item')</script>";
		
	}
	else{
	$due="select sprice from stocks where sid='$getbuy'";
	$due1=mysqli_query($conn,$due);
	$due2=mysqli_fetch_array($due1);
	$due3=$due2[0];
	$insert="update inmate set dues=dues+$due3 where iid='$a'";
	$due4=mysqli_query($conn,$insert);
	$check="select * from transact where iid='$a' and sid='$getbuy'";
	$check1=mysqli_query($conn,$check);
	if(mysqli_num_rows($check1)>0)
	{
		$ch1="update transact set iquant=iquant+1, rate=rate+$due3 where sid='$getbuy' and iid='$a'";
		$ch2=mysqli_query($conn,$ch1);
	}else{
	$fc="insert into transact values('$a','$getbuy','1','$due3')";
	$fc1=mysqli_query($conn,$fc);
	}
	$quantt="update stocks set squan=squan-1 where sid='$getbuy'";
	$quan1=mysqli_query($conn,$quantt);
	echo"<script>alert('Added To Cart')</script>";
	
	echo"<script>window.open('inventory.php?va=$a','_self')</script>";
}}
?>
</body>
</html>
