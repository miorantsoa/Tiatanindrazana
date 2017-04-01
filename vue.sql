CREATE VIEW `article_categories` AS
  SELECT
    `categorie`.`idcategorie` AS `idcategorie`,
    `categorie`.`libelle`     AS `libelle`,
    `categorie`.`niveau`      AS `niveau`,
    `categorie`.`rang_cat`    AS `rang_cat`,
    `categorie_mere`.`idcategorie`    AS `idmere`,
    `categorie_mere`.`libelle`        AS `catmere`
  FROM ((`categorie`
    LEFT JOIN `assoc_sous_categorie`
      ON ((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie2`))) LEFT JOIN
    `categorie_mere` ON ((`assoc_sous_categorie`.`idcategorie1` = `categorie_mere`.`idcategorie`)));
CREATE VIEW `article_journal` AS
  SELECT
    `detail_article`.`idarticle`        AS `idarticle`,
    `detail_article`.`idjournal`        AS `idjournal`,
    `detail_article`.`idcategorie`      AS `idcategorie`,
    `detail_article`.`idadministrateur` AS `idadministrateur`,
    `detail_article`.`dateparution`     AS `dateparution`,
    `detail_article`.`titre`            AS `titre`,
    `detail_article`.`extrait`          AS `extrait`,
    `detail_article`.`resume`           AS `resume`,
    `detail_article`.`contenue`         AS `contenue`,
    `detail_article`.`laune`            AS `laune`,
    `detail_article`.`etatpublication`  AS `etatpublication`,
    `detail_article`.`niveau`           AS `niveau`,
    `detail_article`.`lien_image_une`   AS `lien_image_une`,
    `detail_article`.`idmere`           AS `idmere`,
    `detail_article`.`catmere`          AS `catmere`,
    `detail_article`.`libelle`          AS `libelle`,
    `detail_article`.`level`            AS `level`,
    `detail_article`.`numeroparution`   AS `numeroparution`,
    `detail_article`.`datepublication`  AS `datepublication`,
    `detail_article`.`liencouverture`   AS `liencouverture`
  FROM (`detail_article`
    JOIN `journal` ON ((`journal`.`idjournal` = `detail_article`.`idjournal`)))
  ORDER BY `detail_article`.`dateparution` DESC;
CREATE VIEW `categorie_mere` AS
  SELECT
    `categorie`.`idcategorie` AS `idcategorie`,
    `categorie`.`libelle`     AS `libelle`,
    `categorie`.`niveau`      AS `niveau`,
    `categorie`.`rang_cat`    AS `rang_cat`
  FROM (`categorie`
    JOIN `assoc_sous_categorie`
      ON ((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie1`)))
  GROUP BY `categorie`.`idcategorie`;
CREATE VIEW `categorie_mere_info` AS
  SELECT
    `categorieinfoutile`.`idcatbeinfo` AS `idcatbeinfo`,
    `categorieinfoutile`.`libelle`     AS `libelle`,
    `categorieinfoutile`.`niveau`      AS `niveau`
  FROM (`categorieinfoutile`
    JOIN `assoc_cat_souscat`
      ON ((`categorieinfoutile`.`idcatbeinfo` = `assoc_cat_souscat`.`idcatbeinfo`)))
  GROUP BY `categorieinfoutile`.`idcatbeinfo`;
CREATE VIEW `couverture_feuille` AS
  SELECT
    `detail_feuille_journal`.`idfeuille_journal` AS `idfeuille_journal`,
    `detail_feuille_journal`.`dateparution`      AS `dateparution`,
    `detail_feuille_journal`.`idmedia`           AS `idmedia`,
    `detail_feuille_journal`.`typemedia`         AS `typemedia`,
    `detail_feuille_journal`.`nommedia`          AS `nommedia`,
    `detail_feuille_journal`.`cheminmedia`       AS `cheminmedia`,
    `detail_feuille_journal`.`creditmedia`       AS `creditmedia`,
    `detail_feuille_journal`.`alt`               AS `alt`
  FROM `detail_feuille_journal`
  GROUP BY `detail_feuille_journal`.`idfeuille_journal`
  ORDER BY `detail_feuille_journal`.`nommedia`;
CREATE VIEW `detail_article` AS
  SELECT
    `article`.`idarticle`        AS `idarticle`,
    `article`.`idjournal`        AS `idjournal`,
    `article`.`idcategorie`      AS `idcategorie`,
    `article`.`idadministrateur` AS `idadministrateur`,
    `article`.`dateparution`     AS `dateparution`,
    `article`.`titre`            AS `titre`,
    `article`.`extrait`          AS `extrait`,
    `article`.`resume`           AS `resume`,
    `article`.`contenue`         AS `contenue`,
    `article`.`laune`            AS `laune`,
    `article`.`etatpublication`  AS `etatpublication`,
    `article`.`niveau`           AS `niveau`,
    `article`.`lien_image_une`   AS `lien_image_une`,
    `article_categories`.`idmere`        AS `idmere`,
    `article_categories`.`catmere`       AS `catmere`,
    `article_categories`.`libelle`       AS `libelle`,
    `article_categories`.`niveau`        AS `level`,
    `journal`.`numeroparution`   AS `numeroparution`,
    `journal`.`datepublication`  AS `datepublication`,
    `journal`.`liencouverture`   AS `liencouverture`
  FROM ((`article`
    JOIN `journal` ON ((`article`.`idjournal` = `journal`.`idjournal`))) JOIN
    `article_categories` ON ((`article`.`idcategorie` = `article_categories`.`idcategorie`)))
  ORDER BY `journal`.`datepublication` DESC;
CREATE VIEW `detail_feuille_journal` AS
  SELECT
    `feuille_journal`.`idfeuille_journal` AS `idfeuille_journal`,
    `feuille_journal`.`dateparution`      AS `dateparution`,
    `media`.`idmedia`                     AS `idmedia`,
    `media`.`typemedia`                   AS `typemedia`,
    `media`.`nommedia`                    AS `nommedia`,
    `media`.`cheminmedia`                 AS `cheminmedia`,
    `media`.`creditmedia`                 AS `creditmedia`,
    `media`.`alt`                         AS `alt`
  FROM ((`feuille_journal`
    JOIN `assoc_feuille_image`
      ON ((`feuille_journal`.`idfeuille_journal` = `assoc_feuille_image`.`idfeuille_journal`))) JOIN
    `media` ON ((`assoc_feuille_image`.`idmedia` = `media`.`idmedia`)));
CREATE VIEW `detail_info_utile` AS
  SELECT
    `infoutil`.`idbeinfo`       AS `idbeinfo`,
    `infoutil`.`idcatbeinfo`    AS `idcatbeinfo`,
    `infoutil`.`titre`          AS `titre`,
    `infoutil`.`contenue`       AS `contenue`,
    `infoutil`.`lienphoto`      AS `lienphoto`,
    `infoutil`.`dernieremaj`    AS `dernieremaj`,
    `infoutil`.`copyrightphoto` AS `copyrightphoto`,
    `infoutil`.`lien`           AS `lien`,
    `info_utile_categorie`.`libelle`    AS `libelle`,
    `info_utile_categorie`.`idmere`     AS `idmere`,
    `info_utile_categorie`.`catmere`    AS `catmere`
  FROM (`infoutil`
    JOIN `info_utile_categorie` ON ((`infoutil`.`idcatbeinfo` = `info_utile_categorie`.`idcatbeinfo`)));
CREATE VIEW `info_utile_categorie` AS
  SELECT
    `categorieinfoutile`.`idcatbeinfo` AS `idcatbeinfo`,
    `categorieinfoutile`.`libelle`     AS `libelle`,
    `categorieinfoutile`.`niveau`      AS `niveau`,
    `categorie_mere_info`.`idcatbeinfo`        AS `idmere`,
    `categorie_mere_info`.`libelle`            AS `catmere`
  FROM ((`categorieinfoutile`
    LEFT JOIN `assoc_cat_souscat`
      ON ((`categorieinfoutile`.`idcatbeinfo` = `assoc_cat_souscat`.`cat_idcatbeinfo`))) LEFT JOIN
    `categorie_mere_info`
      ON ((`assoc_cat_souscat`.`idcatbeinfo` = `categorie_mere_info`.`idcatbeinfo`)));
CREATE VIEW `last_journal` AS
  SELECT
    `article_journal`.`idarticle`        AS `idarticle`,
    `article_journal`.`idjournal`        AS `idjournal`,
    `article_journal`.`idcategorie`      AS `idcategorie`,
    `article_journal`.`idadministrateur` AS `idadministrateur`,
    `article_journal`.`dateparution`     AS `dateparution`,
    `article_journal`.`titre`            AS `titre`,
    `article_journal`.`extrait`          AS `extrait`,
    `article_journal`.`resume`           AS `resume`,
    `article_journal`.`contenue`         AS `contenue`,
    `article_journal`.`laune`            AS `laune`,
    `article_journal`.`etatpublication`  AS `etatpublication`,
    `article_journal`.`niveau`           AS `niveau`,
    `article_journal`.`lien_image_une`   AS `lien_image_une`,
    `article_journal`.`libelle`          AS `libelle`,
    `article_journal`.`level`            AS `level`,
    `article_journal`.`numeroparution`   AS `numeroparution`,
    `article_journal`.`datepublication`  AS `datepublication`,
    `article_journal`.`liencouverture`   AS `liencouverture`
  FROM `article_journal`
  WHERE `article_journal`.`datepublication` IN (SELECT max(`article_journal`.`datepublication`) AS `datepublication`
                                                FROM `article_journal`);
CREATE VIEW `sous_categorie` AS
  SELECT
    `categorie`.`idcategorie` AS `idcategorie`,
    `categorie`.`libelle`     AS `libelle`,
    `categorie`.`niveau`      AS `niveau`,
    `categorie`.`rang_cat`    AS `rang_cat`,
    `categorie_mere`.`idcategorie`    AS `idmere`,
    `categorie_mere`.`libelle`        AS `catmere`
  FROM ((`categorie`
    JOIN `assoc_sous_categorie`
      ON ((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie2`))) JOIN
    `categorie_mere` ON ((`assoc_sous_categorie`.`idcategorie2` = `categorie`.`idcategorie`)));
CREATE VIEW `sous_categorie_info` AS
  SELECT
    `categorieinfoutile`.`idcatbeinfo` AS `idcatbeinfo`,
    `categorieinfoutile`.`libelle`     AS `libelle`,
    `categorieinfoutile`.`niveau`      AS `niveau`,
    `categorie_mere_info`.`idcatbeinfo`        AS `idmere`,
    `categorie_mere_info`.`libelle`            AS `catmere`
  FROM ((`categorieinfoutile`
    JOIN `assoc_cat_souscat`
      ON ((`assoc_cat_souscat`.`cat_idcatbeinfo` = `categorieinfoutile`.`idcatbeinfo`))) JOIN
    `categorie_mere_info`
      ON ((`categorie_mere_info`.`idcatbeinfo` = `assoc_cat_souscat`.`idcatbeinfo`)));
