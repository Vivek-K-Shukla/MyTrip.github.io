<?php
$insert = false;
if(isset($_POST['name'])){
//Set Connection Variables:
$server = "localhost";
$username = "root";
$password = "";

//connecting to the database:
$con = mysqli_connect($server, $username, $password);

//Check for connection success:
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
//echo "Success connecting to the db";

//executing mysql queries(collecting post Variables):
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

//Execute the query:
if($con->query($sql) == true){
//   echo "Successfully Inserted";

//Flag for successful Insertion:
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

//Close the database connection:
$con->close();
}

?>

<!-------Documentation------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Mulish:wght@200&family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="S.R.G.I">
       <div class="container">
           <h1>Welcome to S.R. Groups Of Institution Manali Trip</h1>
           <p>Enter your details and submit your form to confirm your participation in the trip</p>
           <?php
           if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form, we are happy to see you joining for the Manali trip</p>";
               }
           ?>


           <form action="index.php" method="post">
               <input type="text" id="name" name="name" placeholder="Enter Your Name">
               <input type="text" id="age" name="age" placeholder="Enter Your Age">
               <input type="text" id="gender" name="gender" placeholder="Enter Your gender">
               <input type="email" id="email" name="email" placeholder="Enter Your Email">
               <input type="phone" id="phone" name="phone" placeholder="Enter Your Phone Number">
               <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other informatiom here"></textarea>
               <button class="btn">Submit</button>
              
           </form>
       </div>

       <script src="index.js"></script>
       
</body>

</html>