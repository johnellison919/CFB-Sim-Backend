<?php
    SQLDatabase::createTable("utilities", [
        "id"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"varchar(191)",
        "lastName"=>"varchar(191)",
        "PRIMARY KEY"=>"(`id`)",
    ]);

    $configQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "utilities` (firstName, lastName)
        VALUES
        ('Adam', 'Appleyard'),
        ('Benny', 'Boyland')";

    $connection->query($configQuery);

    echo("Config table has been created!<br>");
