CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `insert_imported_data`()
BEGIN
	DECLARE done INT DEFAULT 0;
    DECLARE count INT;
	DECLARE i_username VARCHAR(45);
    DECLARE i_password VARCHAR(45);
    DECLARE i_name VARCHAR(45);
    DECLARE i_last_name VARCHAR(45);
    DECLARE i_email VARCHAR(45);
	DECLARE c_import_data CURSOR FOR 
	SELECT username, password, nombre, primer_apellido, email
		FROM conversion_database.usertable1, conversion_database.usertable2
		WHERE persona_id = fk_person_id;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	
    OPEN c_import_data;
    read_loop: LOOP 
		FETCH c_import_data INTO i_username, i_password, i_name, i_last_name, i_email;
        SELECT COUNT(*) INTO count
        FROM user_table 
			WHERE user_table.username = i_username 
			AND user_table.user_password = i_password
			AND user_table.first_name = i_name
			AND user_table.last_name = i_last_name
			AND user_table.email = i_email;
        
        IF count < 1 THEN
			INSERT INTO user_table (Username, User_Password, First_Name, Last_Name, Email, User_Type) 
			VALUES(i_username, i_password, i_name, i_last_name, i_email, 'Regular User');
		END IF;
        
        IF done = 1 THEN 
			LEAVE read_loop;
		END IF;
	END LOOP;
    CLOSE c_import_data;
END