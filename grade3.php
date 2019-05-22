<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "labprep";

$dbServername = "localhost";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if ( isset( $_POST['search'] ) ) {
    $search = $_POST['search'];

    $selection = $_POST['alphabetical'];

    if ($selection=="alphabetical") {
        $sql = "SELECT * FROM persons WHERE FirstName LIKE '%".$search."%' ORDER BY firstname";
    }
    else {
        $sql = "SELECT * FROM persons WHERE FirstName LIKE '%".$search."%' ORDER BY firstname DESC";
    }

    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    echo "<table>";
        echo "<tr>";
            echo "<th>FirstName</th>";
            echo "<th>LastName</th>";
            echo "<th>Address</th>";
            echo "<th>City</th>";
        echo "</tr>";

    if ($resultcheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
                echo "<td>".$row['FirstName']."</td>";
                echo "<td>".$row['LastName']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "<td>".$row['City']."</td>";
            echo "</tr>";
                
        }
    }
    echo "</table>";
}



?>