CREATE VIEW detail_corruption AS
  SELECT
    corruption.idcorruption,
    corruption.idcatcorruption,
    corruption.datedenonciation,
    corruption.datefait,
    corruption.nomdenonciateur,
    corruption.adressedenonciateur,
    corruption.telephonedenonciateur,
    corruption.emaildenonciateur,
    corruption.sujet,
    corruption.contenue,
    corruption.lieu,
    media.cheminmedia,
    media.alt,
    categoriecorruption.libelle
  FROM corruption
    JOIN fichiercorruption ON corruption.idcorruption = fichiercorruption.idcorruption
    JOIN media ON fichiercorruption.idmedia = media.idmedia
    JOIN categoriecorruption ON corruption.idcatcorruption = categoriecorruption.idcatcorruption;