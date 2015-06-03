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
