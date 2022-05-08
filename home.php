<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- import css link -->
    <link rel="stylesheet" href="./style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>

<body>


        <div class="container">
            <nav >

                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="index.php">Add new User</a></li>
                </ul>
            </nav>
            <h2>Welcome to the landing page</h2>
            <?php
            // connect to the database
            $conn = mysqli_connect("localhost", "root", "mysql", "project");
            // Check connection
            if ($conn === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            // Perorming select query to select all the data from the database
            $sql = "SELECT * FROM users";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1' style='border-collapse: collapse; width:90vw' >";
                    echo "<tr>";
                    echo "<th>First Name</th>";
                    echo "<th>Last Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Street Address</th>";
                    echo "<th>Street Address 2</th>";
                    echo "<th>City</th>";
                    echo "<th>State</th>";
                    echo "<th>Code</th>";
                    echo "<th>Phone Number</th>";
                    echo "<th>Company</th>";
                    echo "<th>Country</th>";
                    echo "<th>Website</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['streetAddress'] . "</td>";
                        echo "<td>" . $row['streetAddress2'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['code'] . "</td>";
                        echo "<td>" . $row['phoneNumber'] . "</td>";
                        echo "<td>" . $row['company'] . "</td>";
                        echo "<td>" . $row['country'] . "</td>";
                        echo "<td>" . $row['website'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
            // close the connection
            mysqli_close($conn);


            ?>

        </div>

</body>

</html>