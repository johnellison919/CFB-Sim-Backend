<?php
    require_once(__DIR__ . "/Classes/SQLDatabase.php");

    SQLDatabase::createInternalTables();

    echo("All tables have been created!");
