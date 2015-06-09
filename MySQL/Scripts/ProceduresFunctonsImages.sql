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

	IF p_specie = '-1' THEN
		SELECT Image.User_Id, Image, Image_Name, Image_Location, Species_Found_Name, username
		FROM Image, species_found, user_table
			WHERE User_Table.User_Id = Image.User_Id
            AND Image.Species_Id = Species_Found.Species_Id
            AND Image_Name != 'First_Image';
    ELSE 
		SELECT Image.User_Id, Image, Image_Name, Image_Location, Species_Found_Name, username
		FROM Image, species_found, user_table
			WHERE p_specie = Species_Found_Name 
            AND Image.Species_Id = Species_Found.Species_Id
			AND Image_Name != 'First_Image'
			AND image.User_Id = user_table.User_Id;
	END IF;
		
END