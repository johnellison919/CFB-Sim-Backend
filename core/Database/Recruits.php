<?php
    SQLDatabase::createTable("recruits", [
        "recruitId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "height"=>"int(11)",
        "weight"=>"int(11)",
        "ethnicity"=>"tinytext",
        "PRIMARY KEY"=>"(`recruitId`)",
    ]);

    $recruitsQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight, ethnicity)
        VALUES
        ('Jake', 'Peralta', 70, 190, 'White'),
        ('Terry', 'Jeffords', 74, 260, 'Black'),
        ('Charles', 'Boyle', 67, 180, 'White'),
        ('Raymond', 'Holt', 70, 220, 'Black')";

    $connection->query($recruitsQuery);

    echo("Recruits table has been created!<br>");
