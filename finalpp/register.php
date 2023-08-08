<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$passw= $_POST['pass'];
$history= $_POST['history'];

// Create a connection
$conn = new mysqli("localhost","root" , "", "final");
// Die if connection was not successful
if ($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into details(fullname, email, phone, age, pass,  history) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fullname, $email, $phone, $age, $passw, $history);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
}

?>