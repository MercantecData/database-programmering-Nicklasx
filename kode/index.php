<?php 
    include 'db.php';
    require('db.php');
    
    $sql = "SELECT * FROM logininfo";
    $result = mysqli_query($conn, $sql);
    $response = array();
    $posts = array();
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id=$row["id"];
            $usern=$row['username']; 
            $passw=$row['password']; 
            
            /*$posts[] = array('id'=> $id, 'username'=> $usern, 'password'=> $passw);
            echo "id: " . $row["id"]. " - Name: " . $row["username"]. " Password: " . $row["password"]. "<br>";*/
        }
    } else {
        echo "0 results";
    }
    $response['posts'] = $posts;
    
    $fp = fopen('results.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);
    

    mysqli_close($conn);


?>
<h2>Login:</h2>
<form action="login.php" method="POST">
    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <input type="submit" value="Login">
</form>
<br><br><br>
<h2>Sign in:</h2>
<form action="register.php" method="POST">
    Username: <br><input type="text" name="username" required> <br>
    Password: <br><input type="password" name="password" required> <br>
    Confirm Password: <br><input type="password" name="password2" required> <br>
    <br><input type="submit" value="Register">
</form>