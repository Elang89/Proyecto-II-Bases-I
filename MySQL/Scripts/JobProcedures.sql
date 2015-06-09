SET GLOBAL event_scheduler = ON; /* correr en SYS */
/*-------------------------------------------------------------------------*/
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `Insert_Daily_Registrations`()
BEGIN
	DECLARE done INT DEFAULT 0;
    DECLARE count INT;
	DECLARE i_name VARCHAR(45);
    DECLARE i_date TIMESTAMP;
	DECLARE c_daily_registrations CURSOR FOR
	SELECT Specie_Name, Register_Date 
		FROM Specie, Species_Found 
		WHERE Species_Found.FK_Specie_Id = Specie.Specie_Id
		AND DATE(Species_Found.Register_date) = CURDATE();
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
    
    OPEN c_daily_registrations;
    read_loop: LOOP 
		FETCH c_daily_registrations INTO i_name, i_date;
		SELECT COUNT(*) INTO count 
			FROM registrations 
			WHERE registrations.Species_Name = i_name
            AND registrations.Registration_Date = i_date;
		IF count != 1 THEN 
			INSERT INTO registrations (Species_Name, Registration_Date) VALUES(i_name, i_date);
		END IF;
        
        IF done = 1 THEN 
			LEAVE read_loop;
		END IF;
	END LOOP;
    CLOSE c_daily_registrations;
END

/*---------------------------------------------------*/
CREATE EVENT daily_registrations 
	ON SCHEDULE
		EVERY 1 DAY
		STARTS '2015-05-31 21:00:00' 
		ON COMPLETION PRESERVE ENABLE  
    DO 
		CALL birddatabase.Insert_Daily_Registrations(); 
		
/*---------------------------------------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `display_daily_registrations`()
BEGIN
	SELECT Species_Name, Registration_Date 
		FROM Registrations 
		WHERE DATE(Registration_Date) = CURDATE();

END