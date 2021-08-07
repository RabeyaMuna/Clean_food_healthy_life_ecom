<?php
session_start();

//db connection
try {
	$con = new PDO("mysql:host=localhost;dbname=fit_ecommerce;", 'root', '');
	echo "<script>console.log('connection successful');</script>";

	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "<script>window.alert('Database connection error');</script>";
}

$productCount = 0;

//o by default means not logged in, 1 means logged in
$is_loggedIn = 0;
$username = '';
$user_id = '';
$cartCount = 0;
$notiCount = 0;

if ((isset($_SESSION['user_id']))) {
	$user_id = $_SESSION['user_id'];
}


//check if logged in
if (isset($_SESSION['username'])) {
	$is_loggedIn = 1;
	$username = $_SESSION['username'];

	//checkNotifications
	try {
		$sql = "SELECT * FROM `notifications` WHERE user_id='" . $user_id . "' AND seen='0' ";
		$object = $con->query($sql);
		$notiCount = $object->rowCount();
	} catch (PDOException $e) {
		echo $ex1;
	}
}



if (isset($_SESSION['user_id'])) {
	//if the user is logged in
	try {
		$sql2 = "SELECT * FROM `cart` WHERE user_id='" . $user_id . "'";
		$object2 = $con->query($sql2);
		$cartCount = $object2->rowCount();
	} catch (PDOException $e) {
		echo $ex1;
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Chat Room</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script>
		function ajax() {
			var req = new XMLHttpRequest();
			req.onreadystatechange = function() {
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send();
		}
		setInterval(function() {
			ajax()
		}, 1000);
	</script>
</head>

<body onload="ajax();">
	<!-- <p style="padding-left: 10px;">
		<a href="../Nutri/nutritionist.php">Back To Previous Page</a>
	</p> -->
	<h2 align="center" style="border-bottom: 1px solid grey;"> CHAT ROOM</h2>
	<div class="ibox-content">
		<div class="row">
			<div style="margin-left: 10%;" class=" col-md-10">
				<div class="chat-discussion">
					<div class="chat-message left">
						<div id="chat"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="background-color:white;" class="row">
		<div style="margin-left: 20%;" class="col-md-8">
			<form method="POST" action="index.php">
				<div></div>
				<!-- <input type="text" name="name" placeholder="Enter your name" required=""> -->
				<textarea name="message" placeholder="Enter your message" required=""></textarea>
				<input type="submit" style="color: white;" name="submit" value="Send it" />
			</form>
		</div>
	</div>
	<div class="footer">
		Developed by : Rabeya Khatun
	</div>
	<?php
	if (isset($_POST['submit'])) {
		// $name = $_POST['name'];
		$message = $_POST['message'];
		$query = "INSERT INTO chat (user_chat_id, msg) VALUES ('$user_id','$message')";
		$run = $con->query($query);

		if ($run) {
	?>
			<audio src='audio/notification.mp3' hidden='true' autoplay='true' />
	<?php
		}
	}
	?>
</body>

</html>