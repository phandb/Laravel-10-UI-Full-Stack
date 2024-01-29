/*
As we scale up, I would like a very quick way to query how many orders each of our 
staff members has served, all-time. I am not a database pro, so I need this to be 
as simple as possible. Something like the following would be ideal…

CALL sp_staffOrdersServed; 
*/

USE confirmation_ui;

DELIMITER //

CREATE PROCEDURE sp_update_candidatesFK_user_id()
BEGIN
	UPDATE candidates
	SET candidates.user_id = users.id
    WHERE candidates.email = users.email;
	
END //

DELIMITER ;

CALL sp_update_candidatesFK_user_id;

