/*Statistic Procedures
Created by Ricardo Leon

*/

-- i. Registered birds
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `registered_birds`()
BEGIN
  SELECT count(specie_id)
  FROM Specie;
END

-- ii. Registered birds per habitat
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `registered_birds_per_habitat`()
BEGIN
	SELECT Habitat_Name, 
    COUNT(habitat_id) AS `Birds_Per_Habitat`
    FROM Specie, Habitat
    WHERE habitat.habitat_id = specie.fk_habitat_id
    GROUP BY Habitat_Name;
END

-- iii. Registered birds per size
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `registered_birds_per_size`()
BEGIN
	SELECT Size_Name, 
    COUNT(Size_Id) AS `Birds_Per_Size`
    FROM Specie, Size
    WHERE Size.Size_Id = specie.FK_Size_Id
    GROUP BY Size_Name;
END

---iv. function `Users_Count`  will be used for `Top5_Users_Registered_Birds` This will count the amount of users in the DB

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `registered_birds_by_user`(
	p_User_Id INT(11)
) RETURNS int(11)
BEGIN
	DECLARE `Birds_Per_User` INT(11);
    SET @`Birds_Per_User` = 1;
    SELECT COUNT(p_User_Id) INTO `Birds_Per_User`
    FROM Specie, User_Table, species_found
    WHERE User_Table.User_Id = species_found.FK_User_Id
    AND Specie.Specie_Id = species_found.FK_Specie_Id
    AND p_User_Id = User_Table.User_Id
    GROUP BY Username;
RETURN `Birds_Per_User`;
END

-- v. Top 5 of users with most birds registered
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `Top5_Users_Registered_Birds`()
BEGIN
	SELECT 
		user_id, 
		username, 
		`registered_birds_by_user`(user_id), 
		FIND_IN_SET( `registered_birds_by_user`(user_id), (
			SELECT 
			GROUP_CONCAT( 
				`registered_birds_by_user`(user_id) 
				ORDER BY `registered_birds_by_user`(user_id) DESC ) 
		FROM user_table)
		)
		AS rank
	FROM user_table
	LIMIT 5;
END
