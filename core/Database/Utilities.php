<?php
    SQLDatabase::createTable("utilities", [
        "utilityId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "PRIMARY KEY"=>"(`utilityId`)",
    ]);

    $configQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "utilities` (firstName, lastName)
        VALUES
        ('Adam', 'Smith'),
        ('Brent', 'Johnson'),
        ('Chris', 'Williams'),
        ('Dennis', 'Brown'),
        ('Elliot', 'Jones'),
        ('Frank', 'Garcia'),
        ('Greg', 'Miller'),
        ('Hayden', 'Davis'),
        ('Isaac', 'Rodriguez'),
        ('Jayden', 'Wilson'),
        ('Kevin', 'Anderson')
        ";

    $connection->query($configQuery);

    echo("Config table has been created!<br>");
