<?php
namespace app\migrations;

use evil\phpmvc\Application;

class m0004_add_admin_account {
    public function up(){
        $SQL = "INSERT INTO admin(username, password) VALUES('admin', 'admin');";
        Application::$app->db->pdo->exec($SQL);
    }

    public function down(){
        $SQL = "DELETE FROM admin WHERE username = 'admin';";
        Application::$app->db->pdo->exec($SQL);
    }
}

