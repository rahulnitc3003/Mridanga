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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NITC MESS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" type="image/jpg" href="../images/icon.jpg">
</head>
<style>
body{
		background-color: #f2efda;
	}
.wrapper {
		padding: 2em 0 4em 0;
		position: relative;
	}
.wrapper > .inner {
		margin:auto;
		width: 40em;
	}
.wrapper.style1 {
		background-color:transparent;
		color: #777;
	}
.wrapper.style1 .feature {
		background-color: #e2d0aa;
		border:double;
	}
	#menu .current_page_item a
	{
		border: 2px solid #693;
		background: #a81b08;
		border-radius: 5px;
		color: #FFF;
	}
</style>
	<body>
	<!-- Banner -->
		<section id="banner">
        	<div id="menu">
				<ul>
					<li class="current_page_item"><a href="logout.php">Logout</a></li>
					<li class="current_page_item"><a href="stdetails.php">Dues List</a></li>
				</ul>
			</div>
			<h1 align=center style=background-color:"#a81b08"><b>Administrator Section</b></h1>
            <img src="../images/admin.jpg" width="1000" height="336" />
        </section>
        <!-- One -->
		<section class="wrapper style1">
			<div class="inner">
            <!--------insert student------->
				<article class="feature">
					<span class="image"><img src="../images/add1.png" alt="" /></span>
					<div class="content">
						<h2>Add Student</h2>
						
                        <a href="adds.php"><button class="button">ADD NEW ONE</button></a>
					</div>
				</article>
                                
                 <!--------counter visit------->
                <article class="feature">
					<span class="image"><img src="../images/visit-counter.png" alt="" /></span>
					<div class="content">
						<h2>Visit Counter</h2>
						
                        <a href="inventory1.php"><button class="button">VISIT</button></a>
					</div>
				</article>
                
                 <!----------manage inventory------->
                <article class="feature">
					<span class="image"><img src="../images/stock.png" alt="" /></span>
					<div class="content">
						<h2>Manage Stocks</h2>
						
                        <a href="maninven.php"><button class="button">MANAGE</button></a>
					</div>
				</article>

                
                <!---------delete operation------->
				<article class="feature">
					<span class="image"><img src="../images/remove.png" alt="" /></span>
					<div class="content">
						<h2>Remove Student</h2>
						
                        <a href="ds.php"><button class="button">REMOVE</button></a>
					</div>
				</article>
               
               
                <!--------Payment---------->
                <article class="feature">
					<span class="image"><img src="../images/pay.png" width="820" height="175" alt="png" /></span>
					<div class="content">
						<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment</h2>
						
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="p1.php"><button class="button">PAYMENT</button></a>
					</div>
				</article>
				
				<!---------feedback operation------->
				<article class="feature">
					<span class="image"><img src="../images/fb.png" alt="" /></span>
					<div class="content">
						<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Get Feedback</h2>
						
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="getfeed.php"><button class="button">GET</button></a>
					</div>
				</article>
			</div>
		</section>
<!------------footer--------------->
		<!-- Footer -->
    	<footer id="footer">
	  	<p class="copyright" style="text-align:right">&copy;&nbsp;&nbsp;Copyright 2016&nbsp;&nbsp;&nbsp;<a href="../blog.html">Developed By:PRALASH</a></p>
	</footer>
	</body>
</html>
