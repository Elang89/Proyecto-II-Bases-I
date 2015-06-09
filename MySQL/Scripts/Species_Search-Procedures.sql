-- Package for species search
-- By Ricardo Leon and modified by Miuyin


CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_my_species`(
        p_User_ID INT(11)
)
BEGIN
		SELECT Species_Found.Species_Id, Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description, Image
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class, Image
        WHERE FK_User_Id = p_User_ID
			AND specie.Specie_Id = species_found.FK_Specie_Id 
			AND specie.FK_Size_Id = Size.Size_Id 
			AND specie.FK_Color_Id = Color.Color_Id 
			AND specie.FK_Habitat_Id = habitat.Habitat_Id
			AND specie.FK_Offspring_Quantity_Id = offspring_quantity.Offspring_Quantity_Id  
			AND specie.FK_Gender_Id = Gender.Gender_Id  
			AND Gender.FK_Family_Id = Family.Family_Id 
			AND Family.FK_Sub_Order_Id = sub_order.Sub_Order_Id 
			AND sub_order.FK_Order_Id = Orders.Order_Id 
			AND Orders.FK_Class_Id = Class.Class_Id 
            AND Specie.FK_Beak_Type_ID = Beak_Type.Beak_Type_ID
			AND species_found.species_id = image.species_id;
END

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_all_species`(
)
BEGIN
        SELECT  Species_Found.Species_Id, Specie_Name, ScientificName, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description, Image
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class, Image
        WHERE specie.Specie_Id = species_found.FK_Specie_Id 
            AND specie.FK_Size_Id = Size.Size_Id 
            AND specie.FK_Color_Id = Color.Color_Id 
            AND specie.FK_Habitat_Id = habitat.Habitat_Id 
            AND specie.FK_Beak_Type_Id = beak_type.Beak_Type_Id
            AND specie.FK_Offspring_Quantity_Id = offspring_quantity.Offspring_Quantity_Id  
            AND specie.FK_Beak_Type_ID = Beak_Type_Id
            AND specie.FK_Gender_Id = Gender.Gender_Id
            AND Gender.FK_Family_Id = Family.Family_Id
            AND Family.FK_Sub_Order_Id = sub_order.Sub_Order_Id 
            AND sub_order.FK_Order_Id = Orders.Order_Id 
            AND Orders.FK_Class_Id = Class.Class_Id
            AND species_found.species_id = image.species_id 
            AND image.Image_Name = 'First_Image'
            ORDER BY Specie.Specie_Name;
END

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_species_detail`(
        p_Species_ID INT(11)
)
BEGIN
        SELECT Species_Id, Specie_Name, ScientificName, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description, Register_Date, Username, First_Name, Last_Name
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class, user_table
        WHERE Specie_ID = p_Species_ID
        AND Specie.Specie_Id = Species_Found.FK_Specie_ID 
		AND User_Table.User_Id = Species_Found.FK_User_ID
		AND Specie.FK_Size_ID = Size.Size_ID
		AND specie.FK_Habitat_Id = habitat.Habitat_Id
		AND Specie.FK_Beak_Type_ID = Beak_Type.Beak_Type_ID
		AND specie.FK_Color_Id = Color.Color_Id
		AND specie.FK_Offspring_Quantity_Id = offspring_quantity.Offspring_Quantity_Id
		AND specie.FK_Gender_Id = Gender.Gender_Id
		AND Gender.FK_Family_Id = Family.Family_Id 
		AND Family.FK_Sub_Order_Id = sub_order.Sub_Order_Id 
		AND Sub_Order.FK_Order_Id = Orders.Order_Id 
		AND Orders.FK_Class_Id = Class.Class_Id;
END


CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_bird`(
	p_Specie_Name VARCHAR(45),
    p_Size_Name VARCHAR(45),
    p_Habitat_Name VARCHAR(45),
    p_Beak_Name VARCHAR(45),
    p_Color_Name VARCHAR(45),
    p_Quantity VARCHAR(45),
    p_Gender_Name VARCHAR(45),
    p_Family_Name VARCHAR(45),
    p_Sub_Order_Name VARCHAR(45),
    p_Order_Name VARCHAR(45),
    p_Class_Name VARCHAR(45)
)
BEGIN
	SELECT 
    Specie.Specie_Name, 
    Species_Found.Species_Id, 
    ScientificName, 
    Size_Name, 
    Habitat_Name, 
    Beak_Name, 
    Color_Name, 
    Quantity, 
    Gender_Name, 
    Family_Name, 
    Sub_Order_Name, 
    Order_Name, 
    Class_Name, 
    Description, 
    Register_Date, 
    Username, 
    First_Name, 
    Last_Name,
    Image
    FROM Specie, Species_found, Size, Habitat, Beak_Type, Color, Offspring_Quantity, Gender, Family, Sub_Order, Orders, Class, user_table, Image
    WHERE (
    (Specie.Specie_Name = COALESCE(p_Specie_Name, specie.Specie_Name) OR p_Specie_Name = '-1')
    AND (Size.Size_Name = COALESCE(p_Size_Name, Size.Size_Name) OR p_Size_Name = '-1')
    AND (Habitat.Habitat_Name = COALESCE(p_Habitat_Name, Habitat.Habitat_Name) OR p_Habitat_Name = '-1')
    AND (Beak_Type.Beak_Name = COALESCE(p_Beak_Name, Beak_Type.Beak_Name) OR p_Beak_Name = '-1')
    AND (Color.Color_Name = COALESCE(p_Color_Name, Color.Color_Name) OR p_Color_Name = '-1')
    AND (Offspring_Quantity.Quantity = COALESCE(p_Quantity, Offspring_Quantity.Quantity) OR p_Quantity = '-1')
    AND (Gender.Gender_Name = COALESCE(p_Gender_Name, Gender.Gender_Name) OR p_Gender_Name = '-1')
    AND (Family.Family_Name = COALESCE(p_Family_Name, Family.Family_Name) OR p_Family_Name = '-1')
    AND (Sub_Order.Sub_Order_Name = COALESCE(p_Sub_Order_Name, Sub_Order.Sub_Order_Name) OR p_Sub_Order_Name = '-1')
    AND (Orders.Order_Name = COALESCE(p_Order_Name, Orders.Order_Name) OR p_Order_Name = '-1')
    AND (Class.Class_Name = COALESCE(p_Class_Name, Class.Class_Name) OR p_Class_Name = '-1')
    ) AND (
    Specie.Specie_Id = Species_Found.FK_Specie_ID 
    AND User_Table.User_Id = Species_Found.FK_User_ID
    AND Specie.FK_Size_ID = Size.Size_ID
    AND specie.FK_Habitat_Id = habitat.Habitat_Id
    AND Specie.FK_Beak_Type_ID = Beak_Type.Beak_Type_ID
    AND specie.FK_Color_Id = Color.Color_Id
    AND specie.FK_Offspring_Quantity_Id = offspring_quantity.Offspring_Quantity_Id
    AND specie.FK_Gender_Id = Gender.Gender_Id
    AND Gender.FK_Family_Id = Family.Family_Id 
    AND Family.FK_Sub_Order_Id = sub_order.Sub_Order_Id 
    AND Sub_Order.FK_Order_Id = Orders.Order_Id 
    AND Orders.FK_Class_Id = Class.Class_Id
    AND Species_Found.Species_Id = Image.Species_Id
    AND Image.Image_Name = 'First_Image'
    )
    ORDER BY Specie_Name;
END
