<?php

SQLDatabase::createTable("schools", [
    "id"=>"int(11) NOT NULL AUTO_INCREMENT",
    "schoolName"=>"varchar(191)",
    "totalWins"=>"varchar(191)",
    "totalLoses"=>"varchar(191)",
    "seasonWins"=>"varchar(191)",
    "seasonLoses"=>"varchar(191)",
    "PRIMARY KEY"=>"(`id`)",
]);

$schoolQuery =
    "INSERT INTO fbdb_schools (schoolName, totalWins, totalLoses, seasonWins, seasonLoses)
    VALUES
    ('Alabama', 0, 0, 0, 0),
    ('Auburn', 0, 0, 0, 0),
    ('Michigan', 0, 0, 0, 0),
    ('Ohio State', 0, 0, 0, 0)";
    
$connection->query($schoolQuery);
