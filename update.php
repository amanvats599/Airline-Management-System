<?php
include 'config.php';

$flight_id = $_POST['flight_id'];
$total_cost = $_POST['price'];
$total_passengers = $_POST['total_passengers'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mob_no = $_POST['mob_no'];
$email = $_POST['email'];

$sql = "INSERT INTO users (FirstName,LastName, MobileNo, Email, Flight_Id, Seats_booked ,Total_Cost) VALUES ('$firstname','$lastname','$mob_no','$email','$flight_id','$total_passengers','$total_cost')";

$result = mysqli_query($conn,$sql);

$sql = "SELECT Available_seats FROM flights WHERE Id =$flight_id";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
$updated_seats = $row['Available_seats'] - $total_passengers;

$sql = "UPDATE flights SET Available_seats= $updated_seats WHERE Id =$flight_id";
$result = mysqli_query($conn,$sql);

$sql = "SELECT LAST_INSERT_ID() as last_id";
$result = mysqli_query($conn,$sql);
echo "Your Ticket has been successfully Booked.<br><br>";

// echo"<table border ='1'>";
// echo "<tr><th>UserId</th><th>FirstName</th><th>LastName</th><th>MobileNo</th><th>Email</th><th>Flight_Id</th><th>Seats_booked</th><th>Total_Cost</th></tr>";

// while ($row = mysqli_fetch_assoc($result)) {
//   echo "<tr><td>{$row['last_id']}</td><td>{$row['$firstname']}</td><td>{$row['LastName']}</td><td>{$row['MobileNo']}</td><td>{$row['Email']}</td><td>{$row['Flight_Id']}</td><td>{$row['Seats_booked']}</td><td>{$row['Total_Cost']}</td></tr>";

// }
// echo "</table>";

mysqli_close($conn);

?>



<!DOCTYPE html>
<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

body{
  background-image: url("images/plane.jpg");
  text-align: center;
  padding-top: 50px;
}
</style>
</head>
<body>

<a href="website.php" class="button">Done</a>


</body>
</html>
