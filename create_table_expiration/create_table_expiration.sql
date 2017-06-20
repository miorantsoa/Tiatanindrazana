CREATE TABLE titan_last_db.abonnement_expire
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idabonnee INT NOT NULL,
    CONSTRAINT abonnement_expire_abonnee_idutilisateur2_fk FOREIGN KEY (idabonnee) REFERENCES abonnee (idutilisateur2)
);
CREATE UNIQUE INDEX abonnement_expire_id_uindex ON titan_last_db.abonnement_expire (id);
CREATE UNIQUE INDEX abonnement_expire_idabonnee_uindex ON titan_last_db.abonnement_expire (idabonnee);