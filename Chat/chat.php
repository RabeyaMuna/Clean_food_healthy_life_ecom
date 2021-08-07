<?php
try {
	$conn = new PDO("mysql:host=localhost;dbname=fit_ecommerce;", 'root', '');
	echo "<script>console.log('connection successful');</script>";

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
}



if (isset($_SESSION['user_id'])) {
	//if the user is logged in
	try {
		$sql2 = "SELECT * FROM `cart` WHERE user_id='" . $user_id . "'";
		$object2 = $conn->query($sql2);
		$cartCount = $object2->rowCount();
	} catch (PDOException $e) {
		echo $ex1;
	}
}
	include 'connection.php';
	$query = "SELECT chat.date,chat.msg,users.name FROM chat inner join users where chat.user_chat_id=users.user_id ORDER BY date ASC";
	$run = $con -> query($query);
	while ($row = $run->fetch_array()) :
?>
<div id="message">
	<img class="message-avatar" src="images/user.png" alt="">
	<a class="message-author" href="#"> <?php echo $row['name'];?> </a>
	<span class="message-date"> <?php echo formatDate($row['date']);?> </span>
	<span class="message-content"> <?php echo $row['msg'];?> </span>
</div>
<?php endwhile; ?>