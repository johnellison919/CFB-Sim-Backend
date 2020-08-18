<?php
    SQLDatabase::createTable("recruits_ratings", [
        "recruitId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "throwingPowerRating"=>"int(11)",
        "throwingAccuracyRating"=>"int(11)",
        "speedRating"=>"int(11)",
        "tackleAvoidanceRating"=>"int(11)",
        "injuryRating"=>"int(11)",
        "staminaRating"=>"int(11)",
        "carryingRating"=>"int(11)",
        "ballCarryingVisionRating"=>"int(11)",
        "blockingRating"=>"int(11)",
        "catchingRating"=>"int(11)",
        "routeRunningRating"=>"int(11)",
        "tackleRating"=>"int(11)",
        "blockSheddingRating"=>"int(11)",
        "coverageRating"=>"int(11)",
        "kickingPowerRating"=>"int(11)",
        "kickingAccuracyRating"=>"int(11)",
        "puntingPowerRating"=>"int(11)",
        "puntingAccuracyRating"=>"int(11)",
        "potentialRating"=>"int(11)",
        "PRIMARY KEY"=>"(`recruitId`)",
    ]);

    $recruitsQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits_ratings`
        (
            throwingPowerRating,
            throwingAccuracyRating,
            speedRating,
            tackleAvoidanceRating,
            injuryRating,
            staminaRating,
            carryingRating,
            ballCarryingVisionRating,
            blockingRating,
            catchingRating,
            routeRunningRating,
            tackleRating,
            blockSheddingRating,
            coverageRating,
            kickingPowerRating,
            kickingAccuracyRating,
            puntingPowerRating,
            puntingAccuracyRating,
            potentialRating
        )
        VALUES
        (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";

    $connection->query($recruitsQuery);

    echo("Recruits_ratings table has been created!<br>");
