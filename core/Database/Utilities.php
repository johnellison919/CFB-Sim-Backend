<?php
    SQLDatabase::createTable("utilities", [
        "utilityId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "ethnicity"=>"tinytext",
        "PRIMARY KEY"=>"(`utilityId`)",
    ]);

    $configQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "utilities` (firstName, lastName, ethnicity)
        VALUES
        ('Adam', 'Smith', 'White'),
        ('Brent', 'Johnson', 'Hispanic'),
        ('Chris', 'Williams', 'Black'),
        ('Dennis', 'Brown', 'Asian'),
        ('Elliot', 'Jones', 'Native American'),
        ('Frank', 'Garcia', 'Hawaiian'),
        ('Greg', 'Miller', ''),
        ('Hayden', 'Davis', ''),
        ('Isaac', 'Rodriguez', ''),
        ('Jayden', 'Wilson', ''),
        ('Kevin', 'Anderson', '')
        ";

    $connection->query($configQuery);

    echo("Config table has been created!<br>");
