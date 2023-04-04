<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jagadeep">
    <meta name="description" content="Student Registration and some data retrieve by conditions">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentreg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["firstname"])){
        echo "<div class='alert alert-danger'> <p class='mb-0'>FirstName Cant Be Empty</p></div>";
    }else {
        $firstname = $_POST["firstname"];
    }
    if(empty($_POST["lastname"])){
        echo "<div class='alert alert-danger'><p class='mb-0'>LastName Cant Be Empty</p></div>";
    }else {
        $lastname = $_POST["lastname"];
    }
    if(empty($_POST["dob"])){
        echo "<div class='alert alert-danger'><p class='mb-0'>DOB Cant Be Empty</p></div>";
    }else {
        $dob = $_POST["dob"];
    }
    if(empty($_POST["gender"])){
        echo "<div class='alert alert-danger'><p class='mb-0'>Gender Cant Be Empty</p></div>";
    }else {
        $gender = $_POST["gender"];
    }
    if(empty($_POST["email"])){
        echo "<div class='alert alert-danger'><p class='mb-0'>Email Cant Be Empty</p></div>";
    }else {
        $email = $_POST["email"];
    }
    if(empty($_POST["password"])){
        echo "<div class='alert alert-danger'><p class='mb-0'>Password Cant Be Empty</p></div>";
    }else {
        $password = $_POST["password"];
    }
  $mobile = $_POST["mobile"];

  $stmt = $conn->prepare("INSERT INTO students (firstname, lastname, dob, gender, mobile, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("sssssss", $firstname, $lastname, $dob, $gender, $mobile, $email, $password);

  if ($stmt->execute() === TRUE) {
    echo "<div class='alert alert-success'> <h4 class='alert-heading'>Success</h4><hr> <p class='mb-0'>New student record created successfully</p></div>";
    header("refresh: 3;  URL=index.html");
  } else {
    echo "<div class='alert alert-danger'>  <h4 class='alert-heading'>Error:</h4><hr> <p class='mb-0'> " . $stmt->error . "</p></div>";
    header("refresh: 3;  URL=registration.html");
  }
 

  $stmt->close();
}

$conn->close();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>