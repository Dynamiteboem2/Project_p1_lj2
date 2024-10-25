/******************************************************
-- Doel: Deleten van een record in de tabel stands op
         basis van het Id
*******************************************************
-- Versie: 01
-- Datum: 24-10-2024
-- Auteur: Dennis Oostrom
******************************************************/

-- Selecteer de juiste database voor je stored procedure
use `sneakerness`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spDeleteStandById;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spDeleteStandById(
    IN Id INT UNSIGNED
)
BEGIN
    DELETE  
    FROM    stand AS stan
    WHERE   stan.id = Id;
END //
DELIMITER  ;

/************* debug code stored procedure **************

CALL spDeleteStandById(2);

********************************************************/
