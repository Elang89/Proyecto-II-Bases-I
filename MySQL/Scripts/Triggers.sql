/* Triggers file created by Ricardo Leon */

/* -------------------------------

Triggers for Beak_Type 

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`beak_type_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`beak_type` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`beak_type_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`beak_type`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();

/* -------------------------------

Triggers for Class 

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`class_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`class` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`class_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`class`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for Color

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`color_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`color` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`color_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`color`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for Family

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`family_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`family` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`family_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`family`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for Gender

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`gender_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`gender` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`gender_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`gender`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for Habitat

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`habitat_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`habitat` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`habitat_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`habitat`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for image

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`image_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`image` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`image_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`image`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for offspring_quantity

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`offspring_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`offspring_quantity` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`offspring_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`offspring_quantity`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for orders

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`orders_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`orders` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`orders_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`orders`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for registrations

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`registrations_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`registrations` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`registrations_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`registrations`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for size

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`size_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`size` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`size_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`size`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for specie

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`specie_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`specie` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`specie_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`specie`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for species_found

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`species_found_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`species_found` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`species_found_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`species_found`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for sub_order

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`sub_order_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`sub_order` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`sub_order_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`sub_order`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
/* -------------------------------

Triggers for user_table

-----------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`user_table_BEFORE_INSERT`
BEFORE INSERT ON `birddatabase`.`user_table` 
FOR EACH ROW
SET
	NEW.`Creation_Date` = sysdate(),
	NEW.`Creation_User` = current_user();

CREATE DEFINER=`DBadmin`@`localhost` TRIGGER `birddatabase`.`user_table_BEFORE_UPDATE`
BEFORE UPDATE ON `birddatabase`.`user_table`
FOR EACH ROW
SET
	NEW.`Modification_Date` = sysdate(),
	NEW.`Modification_User` = current_user();
    
