<?php
namespace app\migrations;

use evil\phpmvc\Application;

class m0006_add_vendor {
    public function up(){
        $SQL = "CREATE TABLE vendors(
            id int PRIMARY KEY AUTO_INCREMENT,
            name varchar(255)
        )ENGINE=INNODB;";

        return Application::$app->db->pdo->exec($SQL);
    }

    public function down(){
        $SQL = "DROP TABLE vendors";
        return Application::$app->db->pdo->exec($SQL);
    }
}
