<?php
    SQLDatabase::createTable("recruits", [
        "id"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"varchar(191)",
        "lastName"=>"varchar(191)",
        "height"=>"varchar(191)",
        "weight"=>"varchar(191)",
        "PRIMARY KEY"=>"(`id`)",
    ]);

    $recruitsQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight)
        VALUES
        ('Jake', 'Peralta', 70, 190),
        ('Terry', 'Jeffords', 74, 260),
        ('Charles', 'Boyle', 67, 180),
        ('Raymond', 'Holt', 70, 220)";

    $connection->query($recruitsQuery);

    echo("Recruits table has been created!<br>");
