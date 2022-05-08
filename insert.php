<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <center>
        <!-- php starts here to connect the data to the mysql database -->
        <?php

        $conn = mysqli_connect("localhost", "root", "mysql", "project");
        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        // taking all 12 values from the form (firstName,lastName,email,streetAddress,streetAddress2,city,state,code,phoneNumber,company,country,website)
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $email = $_REQUEST['email'];
        $streetAddress = $_REQUEST['streetAddress'];
        $streetAddress2 = $_REQUEST['streetAddress2'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $code = $_REQUEST['code'];
        $phoneNumber = $_REQUEST['phoneNumber'];
        $company = $_REQUEST['company'];
        $country = $_REQUEST['country'];
        $website = $_REQUEST['website'];
        // Perorming inser query to insert the data into the database
        // our table name is users
        $sql = "INSERT INTO users (firstName,lastName,email,streetAddress,streetAddress2,city,state,code,phoneNumber,company,country,website) VALUES ('$firstName','$lastName','$email','$streetAddress','$streetAddress2','$city','$state','$code','$phoneNumber','$company','$country','$website')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            // go to the home page
            header("Location: home.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        // close the connection
        mysqli_close($conn);



        ?>



        <!-- end php insert -->
    </center>

</body>

</html>