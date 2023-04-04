<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jagadeep">
    <meta name="description" content="Student Registration and some data retrive by conditions">
    <title>Students Ascending Order By Name</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <h1 class="mt-5 mb-4">Students Ascending Order By Name</h1>
	<?php
	show_order_students();
	?>
    <h1>
        <a class="btn btn-secondary btn-lg btn-block" href="index.html">Return</a>
    </h1>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

function show_order_students() {
    
    $host = "localhost";
    $user = "root";
    $password_db = "";
    $database = "studentreg";
    $conn = mysqli_connect($host, $user, $password_db, $database);

  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    $sql = "SELECT * FROM students order by firstname asc";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Name: " . $row["firstname"] . " " . $row["lastname"] . "</h5>" .
                 "<p class='card-text'>Date of Birth: " . $row["dob"] . "</p>" .
                 "<p class='card-text'>Gender: " . $row["gender"] . "</p>" .
                 "<p class='card-text'>Mobile: " . $row["mobile"] . "</p>" .
                 "<p class='card-text'>Email: " . $row["email"] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    
    mysqli_close($conn);
}

?>