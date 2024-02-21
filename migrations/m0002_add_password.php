<?php
namespace app\migrations;

class m0002_add_password
{
    public function up()
    {
        $SQL = "ALTER TABLE users ADD COLUMN password varchar(255) NOT NULL";
        \evil\phpmvc\Application::$app->db->pdo->exec($SQL);
    }

    public function down()
    {
        $SQL = "ALTER TABLE users DROP COLUMN password;";
        \evil\phpmvc\Application::$app->db->pdo->exec($SQL);
    }
}
