<?php
    SQLDatabase::createTable("players", [
        "playerId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "schoolId"=>"int(11)",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "height"=>"int(11)",
        "weight"=>"int(11)",
        "ethnicity"=>"tinytext",
        "position"=>"tinytext",
        "class"=>"tinytext",
        "PRIMARY KEY"=>"(`playerId`)",
    ]);

    $playersQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "players` (schoolId, firstName, lastName, height, weight, ethnicity, position, class)
        VALUES
        (1, 'Jim', 'Roberts', 70, 190, 'White', 'FS', 'Freshman'),
        (2, 'Herbert', 'Post', 74, 260, 'Black', 'LOLB', 'Sophomore'),
        (3, 'Landon', 'Dixon', 67, 180, 'White', 'QB', 'Junior'),
        (4, 'Edmond', 'Williams', 70, 220, 'Black', 'WR', 'Senior')";

    $connection->query($playersQuery);

    echo("Players table has been created!<br>");
