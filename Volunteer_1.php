<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "community";

$conn = new mysqli($servername, $username, $password, $dbname);
$V_email=$_SESSION['email']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Volunteer</title>
</head>
<body>
    <div class="container">
        <h4>Welcome <?php echo $V_email; ?></h4><br>  
        <h3>Suggestion with respect to your hobbies</h3>
        <?php 
        $sql = "SELECT * FROM volunteer_register WHERE email='$V_email'";
        $result = $conn->query($sql);
        $Volunteer = $result->fetch_assoc();
        $V_hobbies = $Volunteer["hobbies"];

        
        $sql2 = "SELECT * FROM organisation_register WHERE hobbies='$V_hobbies'";
        $result2 = $conn->query($sql2);
        if($result2->num_rows > 0){
            while($Organisation = $result2->fetch_assoc())
            echo " Name: ".$Organisation['name']. " -Email ID: ".$Organisation['email']."<br>";
        }
       
        ?>
        <h4> others </h4>
        <?php
       // $sql3 = "SELECT * FROM organisation_register EXCEPT hobbies='$V_hobbies'";
        //$result3 = $conn->query($sql3);
        //if($result->num_rows > 0){
           // while($Organisation = $result2->fetch_assoc())
           // echo " Name: ".$Organisation['name']. " -Email ID: ".$Organisation['email']."<br>";
        //}
        ?>
    </div>
</body>
</html>