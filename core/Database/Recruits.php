<?php
    SQLDatabase::createTable("recruits", [
        "recruitId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "height"=>"int(11)",
        "weight"=>"int(11)",
        "ethnicity"=>"tinytext",
        "position"=>"tinytext",
        "PRIMARY KEY"=>"(`recruitId`)",
    ]);

    $recruitsQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight, ethnicity, position)
        VALUES
        ('Jake', 'Peralta', 70, 190, 'White', 'WR'),
        ('Terry', 'Jeffords', 74, 260, 'Black', 'MLB'),
        ('Charles', 'Boyle', 67, 180, 'White', 'K'),
        ('Raymond', 'Holt', 70, 220, 'Black', 'QB')";

    $connection->query($recruitsQuery);

    echo("Recruits table has been created!<br>");
