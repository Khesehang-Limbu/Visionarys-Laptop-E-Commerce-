<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "../../../config/db_config.php");

if(isset($_POST["submit"])){
    $admin_username = $_POST["username"];
    $admin_password = $_POST["password"];

    $sql = "SELECT * FROM admin";
    $res = $conn->query($sql);

    if($res)
    while($row = $res->fetch_assoc()){
        if(($row["username"] == $admin_username) && ($row["password"] == $admin_password)){
            header("Location: dashboard");
        }else{
            header("Refresh:0");
        }
    }
}
?>

<link href="admin/css/admin-style.css" rel="stylesheet" />
<div class="form-wrapper">
    <div class="logo">
        <img src="../images/Logo.png" />
    </div>
    <form method="post" action="">
        <div class="form-fields">
            <div class="form-field">
                <label for="username">
                    Username:
                </label>
                <input id="username" type="text" name="username"/>
            </div>
            <div class="form-field">
                <label for="password">
                    Password:
                </label>
                <input id="password" type="password" name="password" />
            </div>
        </div>
        <div class="submit-btn">
            <button type="submit" class="btn-submit" name="submit">Login</button>
        </div>
    </form>
</div>
