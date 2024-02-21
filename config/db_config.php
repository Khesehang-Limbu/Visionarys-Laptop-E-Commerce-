<?php
$server_name = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "visionarys_laptops";
$does_exist = false;
$conn = mysqli_connect($server_name, $db_user, $db_pass) or die("Connection To The MySQl Server Failed");

$sql = "SHOW DATABASES;";
$res = $conn->query($sql);

while($row = $res->fetch_assoc()){
    if($row["Database"] == "visionarys_laptops"){
        $does_exist = true;
        break;
    }
}

if(!$does_exist){
    $sql = "CREATE DATABASE visionarys_laptops;";
    $res = $conn->query($sql);

    if($res){
        header("Location: /admin");
    }
}else{
    mysqli_select_db($conn, "visionarys_laptops");
    $sql = "SHOW TABLES LIKE 'admin';";
    $res = $conn->query($sql);
    if($res->num_rows == 0){
        $sql = "CREATE TABLE admin(
                id int PRIMARY KEY auto_increment,
                username varchar(100),
                password varchar(100)
                );";
        $res = $conn->query($sql);

        if(!$res){
            exit();
        }else{
            $sql = "INSERT INTO admin(username, password) VALUES('admin', 'admin@123');";
            $res = $conn->query($sql);

            if(!$res){
                exit();
            }
        }
    }
}
