DELIMITER |
create TRIGGER journal_inexistant BEFORE INSERT on article
  FOR EACH ROW
  BEGIN
    DECLARE id INT;
    SELECT idjournal INTO id from journal WHERE journal.datepublication = NEW.dateparution LIMIT 1;
    if(id = 0 or id is NULL ) THEN
      INSERT  INTO  journal (datepublication) VALUES (new.dateparution);
      SET new.idjournal = LAST_INSERT_ID();
     END IF ;
  END |