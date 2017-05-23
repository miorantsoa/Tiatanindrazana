alter table article add column url_tag  varchar(200) null after titre;
drop VIEW  detail_article;
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
    `article`.`url_tag`          AS `url_tag`,
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
  ORDER BY `journal`.`datepublication` DESC
drop VIEW  article_journal;
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
    `detail_article`.`liencouverture`   AS `liencouverture`,
    `detail_article`.`url_tag`          AS `url_tag`
  FROM (`detail_article`
    JOIN `journal` ON ((`journal`.`idjournal` = `detail_article`.`idjournal`)))
  ORDER BY `detail_article`.`dateparution` DESC;
drop view last_journal;
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
    `article_journal`.`url_tag`          AS `url_tag`,
    `article_journal`.`liencouverture`   AS `liencouverture`
  FROM `article_journal`
  WHERE `article_journal`.`datepublication` IN (SELECT max(`article_journal`.`datepublication`) AS `datepublication`
                                                FROM `article_journal`);