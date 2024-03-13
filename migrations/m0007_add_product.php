<?php

namespace app\migrations;

use evil\phpmvc\Application;

class m0007_add_product {
    public function up(){
        $SQL = "CREATE TABLE products(
            id int PRIMARY KEY AUTO_INCREMENT,
            category int,
            vendor int,
            feature_image varchar(200),
            title varchar(255) NOT NULL,
            description varchar(1000),
            processor varchar(255),
            graphics varchar(255),
            memory varchar(255),
            storage varchar(255),
            screen varchar(255),
            os varchar(255),
            price int,
            is_featured TINYINT(1),
            FOREIGN KEY(vendor) REFERENCES vendors(id),
            FOREIGN KEY(category) REFERENCES category(id) ON DELETE CASCADE
        )ENGINE=INNODB;";

        return Application::$app->db->pdo->exec($SQL);
    }

    public function down(){
        $SQL = "DROP TABLE products;";

        return Application::$app->db->pdo->exec($SQL);
    }
}
