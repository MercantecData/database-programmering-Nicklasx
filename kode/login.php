<?php
    include "db.php";
    $userN = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM logininfo WHERE `username`= '$userN'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if($row["username"] == $userN && $row["password"] == $pass) 
            {
                echo "You are currect logged in as " . $row["username"];
            } else {
                echo "It's not the correct password or username";
            }
            //echo "id: " . $row["id"]. " - Name: " . $row["userName"]. " " . $row["password"]. "<br>";
        }
    } else {
        echo "It's not the correct password or username";
    }
    
    mysqli_close($conn);
?>