<?php header("Content-type: text/css"); ?>

<?php
error_reporting(0);
include '../../dbconnect.php';
session_start();
// fetch image from database
if (isset($_SESSION['username']))
{
	$sql = "select * from users where username=" . "'" . $_SESSION['username'] . "'"; // change this id as per your need
	$result = mysqli_query($conn, $sql) or die('Error ' . mysqli_error($conn));
	$row = mysqli_fetch_array($result);
}

?>

@font-face { 
	font-family: 'Raleway';
	src: url('../fonts/raleway_thin-webfont.eot');
	src: url('../fonts/raleway_thin-webfont.eot?#iefix') format('embedded-opentype'),
	     url('../fonts/raleway_thin-webfont.woff') format('woff'),
	     url('../fonts/raleway_thin-webfont.ttf') format('truetype'),
	     url('../fonts/raleway_thin-webfont.svg#webfont') format('svg');
}

html,body {
	min-height: 100vh;
	width: 100%;
}

.h-nav {
	display:flex;
	flex-flow: row nowrap;
	width: 100%;
	height: 2rem;
	background: rgba(0,0,0,0.15);
	backdrop-filter: blur(0.5rem);
	position: fixed;
	color: #FFFF;
	z-index: 90;
	top: 0;
}

.h-nav ion-icon {
	height: 100%;
	font-size: 2.5rem;
}

.v-nav-primary,.v-nav-services {
	position: fixed;
	width: 15rem;
	height: 100vh;
	background: rgba(0,0,0,0.5);
	color: #FFFF;
	transition: 0.5s;
	left:-15rem;
	z-index: 100;
	backdrop-filter: blur(0.5rem);
	top: 0;
}
.v-nav-primary:hover,.v-nav-services:hover {
	background: rgba(25,118,210,0.7);
}
.v-nav-services {
	background: rgba(57,73,171,0.6);
}
.v-nav-primary>ion-icon,.v-nav-services>ion-icon {
	margin-top: 1rem;
	padding: 0.5rem;
	font-size: 2rem;
	transition: 0.5s;
}

.v-nav-primary>ion-icon:hover,.v-nav-services>ion-icon:hover {
	background: #FFFF;
	color: #1976D2;
	border-radius: 100%;
}
<?php
if(isset($_SESSION['username']))
{
	echo ".item1>ion-icon:hover {
	}";
}
else
{
	echo ".item1>ion-icon:hover {
		background: #FFFF;
		color: #64B5F6;
	}";
}
?>
.v-nav-services>.item1 {
	margin-top: 1.5rem;
}
.v-nav-services>.v-nav-item {
	font-size: 1.1rem;
}

.v-nav-item {
	width: 95%;
	display: flex;
	font: 1.2rem "Segoe UI Light";
	margin-top: 1rem;
	align-items: center;
	height: 3.4rem;
	transition: 0.5s; 
}

.v-nav-item:hover {
	background: #FFFF;
	color: #1565C0;
	border-radius: 0 2rem 2rem 0;
}

.v-nav-item>ion-icon {
	font-size: 2rem;
	padding: 0.7rem;
}
	
.item1 {
	width: 100%;
	display: flex;
	flex-flow: column nowrap;
	align-items: center;
	font: 2rem Raleway;
	margin-top: 4rem;
}

.item2 {
	margin-top: 2rem;
}

.item1>ion-icon {
	font-size: 5.5rem;
	padding: 1rem;
	border: 1px solid #FFFF; 
	border-radius: 100%;
	margin-bottom: 0.5rem;
	transition: 0.5s; 
}

.v-nav-primary>.item1>ion-icon {
    font-size: 6.5rem;
    padding: 1.5rem;
}

.item1>ion-icon {
	<?php echo 'background: url("data:image/jpeg;base64,' . base64_encode($row['imagedata']) . '");'; ?>
	background-size:cover;
	background-position: center;
}

.login {
	margin-left: auto;
}

.sign-up,.login {
	margin-right: 1.5rem;
}

.login>ion-icon,.sign-up>ion-icon {
	font-size: 2.1rem;
}
