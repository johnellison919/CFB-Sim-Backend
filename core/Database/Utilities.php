<?php
    SQLDatabase::createTable("utilities", [
        "utilityId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "ethnicity"=>"tinytext",
        "position"=>"tinytext",
        "PRIMARY KEY"=>"(`utilityId`)",
    ]);

    $configQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "utilities` (firstName, lastName, ethnicity, position)
        VALUES
        ('Adam', 'Smith', 'White', 'QB'),
        ('Brent', 'Johnson', 'Hispanic', 'HB'),
        ('Chris', 'Williams', 'Black', 'FB'),
        ('Dennis', 'Brown', 'Asian', 'WR'),
        ('Elliot', 'Jones', 'Native American', 'TE'),
        ('Frank', 'Garcia', 'Hawaiian', 'LT'),
        ('Greg', 'Miller', '', 'RT'),
        ('Hayden', 'Davis', '', 'C'),
        ('Isaac', 'Rodriguez', '', 'LG'),
        ('Jayden', 'Wilson', '', 'RG'),
        ('Kevin', 'Anderson', '', 'DE'),
        ('', '', '', 'DT'),
        ('', '', '', 'LOLB'),
        ('', '', '', 'MLB'),
        ('', '', '', 'ROLB'),
        ('', '', '', 'CB'),
        ('', '', '', 'SS'),
        ('', '', '', 'FS'),
        ('', '', '', 'K'),
        ('', '', '', 'P')
        ";

    $connection->query($configQuery);

    echo("Config table has been created!<br>");
