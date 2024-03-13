<?php

namespace app\migrations;

class m0003_add_admin
{
    public function up()
    {
        $SQL = "CREATE TABLE admin(
            id INT AUTO_INCREMENT PRIMARY KEY,
            username varchar(255),
            password varchar(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        \evil\phpmvc\Application::$app->db->pdo->exec($SQL);
    }

    public function down()
    {
        $SQL = "DROP TABLE admin";
        \evil\phpmvc\Application::$app->db->pdo->exec($SQL);
    }
}
