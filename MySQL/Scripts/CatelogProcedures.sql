-- Script By Miuyin Yong M
-- May 24 2015

----------------------------Inserts----------------------------------------

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_class`( 
     p_class_Name VARCHAR(45)
) RETURNS int(11)
BEGIN
	DECLARE 
		class_count INT;
	SELECT COUNT(p_class_Name) INTO class_count FROM Class
    WHERE p_class_Name = Class.Class_Name;
    
    IF class_count >= 1 THEN
		RETURN -1;
	ELSEIF class_count = 0 THEN
		INSERT INTO Class(Class_Name)
        VALUES (p_class_Name);
        RETURN 1;
	END IF;
END
--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_order`(
     p_order_Name VARCHAR(45), 
     p_class VARCHAR(45)
) RETURNS int(11)
BEGIN
	DECLARE d_class_id INT; 
	DECLARE order_count INT;  
    
	SELECT COUNT(p_order_Name) INTO order_count FROM Orders
    WHERE p_order_Name = Orders.Order_Name; 
    
    SELECT Class_Id INTO d_class_id FROM Class 
    Where p_class = Class.Class_Name; 
    
    IF order_count >= 1 THEN
		RETURN -1;
	ELSEIF order_count = 0 THEN
		INSERT INTO Orders(Order_Name, FK_Class_Id)
        VALUES (p_order_Name, d_class_id);
        RETURN 1;
	END IF;
END

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_suborder`(
     p_suborder_Name VARCHAR(45), 
     p_order VARCHAR(45)
) RETURNS int(11)
BEGIN
	DECLARE suborder_count INT; 
    DECLARE d_order_id INT;
    
	SELECT COUNT(p_suborder_Name) INTO suborder_count FROM Sub_Order
    WHERE p_suborder_Name = Sub_Order.Sub_Order_Name; 
    
    SELECT Order_Id INTO d_order_id FROM Orders 
    Where p_order = Orders.Order_Name ;
    
    IF suborder_count >= 1 THEN
		RETURN -1;
	ELSEIF suborder_count = 0 THEN
		INSERT INTO Sub_Order(Sub_Order_Name, FK_Order_Id)
        VALUES (p_suborder_Name, d_order_id);
        RETURN 1;
	END IF;
END

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_family`(
     p_family_Name VARCHAR(45),
     p_suborder VARCHAR(45)
) RETURNS int(11)
BEGIN
	DECLARE family_count INT; 
	DECLARE d_suborder_id INT;
    
	SELECT COUNT(p_family_Name) INTO family_count FROM Family
    WHERE p_family_Name = Family.Family_Name; 
    
    SELECT Sub_Order_Id INTO d_suborder_id From Sub_Order 
    WHERE p_suborder = Sub_Order.Sub_Order_Name;
    
    IF family_count >= 1 THEN
		RETURN -1;
	ELSEIF family_count = 0 THEN
		INSERT INTO Family(Family_Name, FK_Sub_Order_Id)
        VALUES (p_family_Name, d_suborder_id);
        RETURN 1;
	END IF;
END


--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_gender`(
     p_gender_Name VARCHAR(45),  
     p_family VARCHAR(45) 
) RETURNS int(11)
BEGIN
	DECLARE gender_count INT; 
	DECLARE d_family_id INT;  
    
	SELECT COUNT(p_gender_Name) INTO gender_count FROM Gender
    WHERE p_gender_Name = Gender.Gender_Name;
    
    SELECT family_id INTO d_family_id FROM Family 
    Where p_family = Family.Family_Name;
    
    IF gender_count >= 1 THEN
		RETURN -1;
	ELSEIF gender_count = 0 THEN
		INSERT INTO Gender(Gender_Name, FK_Family_Id)
        VALUES (p_gender_Name, d_family_id);
        RETURN 1;
	END IF;
END 
   

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_species`(
     p_species_Name VARCHAR(45),  
     p_scientific_Name VARCHAR(45), 
     p_gender VARCHAR(45), 
     p_Size VARCHAR(45),  
     p_habitat VARCHAR(45),  
     p_beak_type VARCHAR(45), 
     p_color  VARCHAR(45), 
     p_offspring  VARCHAR(45)
) RETURNS int(11)
BEGIN
	DECLARE species_count INT; 
    DECLARE d_gender_id INT;  
    DECLARE d_size_id INT; 
    DECLARE d_habitat_id INT; 
    DECLARE d_beak_id INT; 
    DECLARE d_color_id INT; 
    DECLARE d_offspring_id INT; 
    
	SELECT COUNT(p_species_Name) INTO species_count FROM Specie 
    WHERE p_species_Name = Specie.Specie_Name;
    
    SELECT Gender_id INTO d_gender_id FROM Gender 
    WHERE p_gender = Gender.Gender_Name;  

    SELECT Size_Id INTO d_size_id 
	FROM Size 
	WHERE p_Size = Size.Size_Name; 

	SELECT Habitat_Id INTO d_habitat_id 
	FROM Habitat
	WHERE p_habitat = Habitat.Habitat_Name; 

	SELECT Beak_Type_Id INTO d_beak_id 
	FROM beak_type
	WHERE p_beak_type = beak_type.Beak_Name; 

	SELECT Color_Id INTO d_color_id 
	FROM Color
	WHERE p_color = Color.Color_Name; 

	SELECT Offspring_Quantity_Id INTO d_offspring_id
	FROM offspring_quantity
	WHERE p_offspring = offspring_quantity.Quantity;
    
    IF species_count >= 1 THEN
		RETURN -1;
	ELSEIF species_count = 0 THEN
		INSERT INTO Specie(Specie_Name, FK_Gender_Id, FK_Size_Id, FK_Habitat_Id, FK_Beak_Type_Id, FK_Color_Id, FK_Offspring_Quantity_Id, ScientificName)
        VALUES (p_species_Name, d_gender_id, d_size_id, d_habitat_id, d_beak_id, d_color_id, d_offspring_id, p_scientific_Name);
        RETURN 1;
	END IF;
END  


--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_size`(
     p_size_Name VARCHAR(45) 
) RETURNS int(11)
BEGIN
	DECLARE 
		size_count INT;
	SELECT COUNT(p_size_Name) INTO size_count FROM Size
    WHERE p_size_Name = Size.Size_Name;
    
    IF size_count >= 1 THEN
		RETURN -1;
	ELSEIF size_count = 0 THEN
		INSERT INTO Size(Size_Name)
        VALUES (p_size_Name);
        RETURN 1;
	END IF;
END

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_habitat`(
     p_habitat_Name VARCHAR(45) 
) RETURNS int(11)
BEGIN
	DECLARE 
		habitat_count INT;
	SELECT COUNT(p_habitat_Name) INTO habitat_count FROM Habitat
    WHERE p_habitat_Name = Habitat.Habitat_Name;
    
    IF habitat_count >= 1 THEN
		RETURN -1;
	ELSEIF habitat_count = 0 THEN
		INSERT INTO Habitat(Habitat_Name)
        VALUES (p_habitat_Name);
        RETURN 1;
	END IF;
END 

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_Beak_Type`(
     p_beak_type_Name VARCHAR(45)
) RETURNS int(11)
BEGIN
	DECLARE 
		beak_type_count INT;
	SELECT COUNT(p_beak_type_Name) INTO beak_type_count FROM Beak_Type
    WHERE p_beak_type_Name = Beak_Type.Beak_Name;
    
    IF beak_type_count >= 1 THEN
		RETURN -1;
	ELSEIF beak_type_count = 0 THEN
		INSERT INTO Beak_Type(Beak_Name)
        VALUES (p_beak_type_Name);
        RETURN 1;
	END IF;
END
 


--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_color`(
     p_color_Name VARCHAR(45) 
) RETURNS int(11)
BEGIN
	DECLARE 
		color_count INT;
	SELECT COUNT(p_color_Name) INTO color_count FROM Color
    WHERE p_color_Name = Color.Color_Name;
    
    IF color_count >= 1 THEN
		RETURN -1;
	ELSEIF color_count = 0 THEN
		INSERT INTO Color(Color_Name)
        VALUES (p_color_Name);
        RETURN 1;
	END IF;
END  

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_offspring_quantity`(
     p_quantity INT 
) RETURNS int(11)
BEGIN
	DECLARE 
		quantity_count INT;
	SELECT COUNT(p_quantity) INTO quantity_count FROM Offspring_Quantity
    WHERE p_quantity = Offspring_Quantity.Quantity;
    
    IF quantity_count >= 1 THEN
		RETURN -1;
	ELSEIF quantity_count = 0 THEN
		INSERT INTO Offspring_Quantity(Quantity)
        VALUES (p_quantity);
        RETURN 1;
	END IF;
END   
 

------------------------------------------------------------------------ 
CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `insert_found_specie`( 
     p_Specie VARCHAR(45),  
     p_user  INT,
     p_description VARCHAR(100)
) RETURNS int(11)
BEGIN
	DECLARE d_specie_id INT; 
    DECLARE count INT;

	SELECT Specie_Id INTO d_specie_id 
	FROM specie 
	WHERE p_Specie = specie.Specie_Name;  

	SELECT COUNT(*) INTO count 
    FROM species_found
    WHERE species_found_name = p_specie;
    
    
	IF count = 0 THEN
		INSERT INTO species_found(FK_User_Id, FK_Specie_Id, Description, Species_Found_Name, Register_Date)
		VALUES (p_user, d_specie_id, p_description, p_specie, CURRENT_DATE);
		RETURN 1;
	ELSE
		RETURN 0;
	END IF;
END

----------------------------Edits---------------------------------------

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_class`(
     New_class_Name VARCHAR(45), 
     p_class_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Class 
	SET Class_Name = New_class_Name
	WHERE p_class_id = Class_Id; 
    
    RETURN 1; 
END
--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_order`(
     New_order_Name VARCHAR(45), 
     p_order_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Orders 
	SET Order_Name = New_order_Name
	WHERE p_order_id = Order_Id; 
    
    RETURN 1; 
END

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_suborder`(
     New_suborder_Name VARCHAR(45), 
     p_suborder_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Sub_Order
	SET Sub_Order_Name = New_suborder_Name
	WHERE p_suborder_id = Sub_Order_Id; 
    
    RETURN 1; 
END

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_family`(
     New_family_Name VARCHAR(45), 
     p_family_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Family 
	SET Family_Name = New_family_Name
	WHERE p_family_id = Family_Id; 
    
    RETURN 1; 
END


--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_gender`(
     New_gender_Name VARCHAR(45), 
     p_gender_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Gender
	SET Gender_Name = New_Gender_Name
	WHERE p_gender_id = Gender_Id; 
    
    RETURN 1; 
END
   

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_specie`(
     New_specie_Name VARCHAR(45), 
     p_specie_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.specie
	SET Specie_Name = New_specie_Name
	WHERE p_gender_id = Specie_Id; 
    
    RETURN 1; 

END  

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_size`(
     New_size_Name VARCHAR(45), 
     p_size_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Size
	SET Size_Name = New_size_Name
	WHERE p_size_id = Size_Id; 
    
    RETURN 1; 

END  

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_habitat`(
     New_habitat_Name VARCHAR(45), 
     p_habitat_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Habitat
	SET Habitat_Name = New_habitat_Name
	WHERE p_habitat_id = Habitat_Id; 
    
    RETURN 1; 

END  

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_beak_type`(
     New_beak_Name VARCHAR(45), 
     p_beak_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.beak_type
	SET Beak_Name = New_beak_Name
	WHERE p_beak_id = Beak_Type_Id; 
    
    RETURN 1; 

END  
 


--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_color`(
     New_color_Name VARCHAR(45), 
     p_color_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.Color
	SET Color_Name = New_Color_Name
	WHERE p_color_id = Color_Id; 
    
    RETURN 1; 

END  

--------------------------------------------------------------------------- 

CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `update_offspringQuantitty`(
     New_offspring_Name VARCHAR(45), 
     p_offspring_id INT
) RETURNS int(11)
BEGIN
	
    UPDATE birddatabase.offspring_quantity
	SET Quantity = New_specie_Name
	WHERE p_gender_id = Offspring_Quantity_Id; 
    
    RETURN 1; 

END    
 

----------------------------Edits----------------------------------------

