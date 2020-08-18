<?php
    SQLDatabase::createTable("recruits", [
        "recruitId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "height"=>"int(11)",
        "weight"=>"int(11)",
        "PRIMARY KEY"=>"(`recruitId`)",
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
