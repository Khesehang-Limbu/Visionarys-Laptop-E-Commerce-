<?php
namespace app\migrations;

use evil\phpmvc\Application;

class m0005_add_category{
    public function up(){
        $SQL = "CREATE TABLE category(
            id int PRIMARY KEY AUTO_INCREMENT,
            name varchar(255),
            description varchar(255)
        )ENGINE=innodb;";
        Application::$app->db->pdo->exec($SQL);
    }


    public function down(){
        $SQL = "DROP TABLE category;";
        Application::$app->db->pdo->exec($SQL);
    }

}
