<?php
namespace app\migrations;

class m0001_initial
{
    public function up()
    {
        $SQL = "CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            full_name VARCHAR(255) NOT NULL,
            address VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        \evil\phpmvc\Application::$app->db->pdo->exec($SQL);
    }

    public function down()
    {
        $SQL = "DROP TABLE users;";
        \evil\phpmvc\Application::$app->db->pdo->exec($SQL);
    }
}
