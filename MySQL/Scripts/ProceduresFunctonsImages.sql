CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `image_insert_image`(p_user_id INT,
     p_species_name VARCHAR(45),
	 p_image_name VARCHAR(45),
     p_image_location VARCHAR(45),
     p_image VARCHAR(200)
	)
BEGIN
	DECLARE v_species_id INT; 
	SELECT species_id INTO v_species_id
        FROM species_found 
        WHERE p_species_name = species_found_name;
        
		INSERT INTO image(User_Id, Species_Id, Image_Name, Image_Location, Image) 
		VALUES(p_user_id, v_species_id, p_image_name, p_image_location, p_image); 
END

/*------------------------------------------------------------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `image_retrieve_images`(p_id INT)
BEGIN
	SELECT User_Id, Image, Image_Name, Image_Location 
    FROM Image
    WHERE p_id = User_Id;
END

/*--------------------------------------------------------------------------*/
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `image_retrieve_specie_images`(p_specie VARCHAR(45))
BEGIN

	SELECT Image.User_Id, Image, Image_Name, Image_Location, Specie_Name, username
    FROM Image, specie, user_table
    WHERE (p_specie = Specie_Name OR p_specie = '-1')
    and image.User_Id = user_table.User_Id;
    
END