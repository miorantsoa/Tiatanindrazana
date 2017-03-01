<?php
/**
* 
*/
//create view detail_article as select article.*,categorie.libelle,categorie.niveau as level,journal.numeroparution,journal.datepublication,journal.liencouverture from article join journal on article.idjournal = journal.idjournal join categorie on article.idcategorie = categorie.idcategorie order by journal.datepublication desc
class ArticlesModel extends CI_Model {
    public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getArticles(){
        $resultat = $this->db->get('article');
        return $resultat->result();
    }

    /**
     * @param $idRubrique
     * @return mixed
     */
    public function getArticleByRubrique($idRubrique){
        $this->db->where('idcategorie',$idRubrique);
        $article = $this->db->get('detail_article');
        return $article->result();
    }

    /**
     * @param $idarticle
     */
    public function getSingleArticle($idarticle){
        $this->db->where('idaricle',$idarticle);
        $article = $this->db->get('article');
        return $article->result();
    }

    public function getArticleByDate($date){
        $this->db->where('dateparution',$date);
        $article =  $this->db->get('detail_article');
        return $article->result();
    }
    

    /**
     * @param $idJournal
     * @param $idCategorie
     * @param $idadministrateur
     * @param $titre
     * @param $extrait
     * @param $resume
     * @param $contenu
     * @param $laune
     * @param $niveau
     * @param $chemin_une
     */
    public function insertArticle($idJournal, $idCategorie, $idadministrateur, $titre, $date ,$extrait, $resume, $contenu, $laune=false, $niveau, $chemin_une,$etat = true){
    	$data = array(
			'idjournal'=>  $idJournal,
			'idcategorie'=> $idCategorie,
			'idadministrateur'=> $idadministrateur,
			'dateparution'=> $date,
			'titre'=> $titre,
			'extrait'=> $extrait,
			'resume'=> $resume,
			'contenue'=> $contenu,
			'laune'=> $laune,
			'etatpublication'=> $etat,
			'niveau'=> $niveau,
			'lien_image_une'=> $chemin_une
    	);
    	$this->db->insert("article",$data);
    }
    public function updateArticle($idarticle,$idJournal, $idCategorie, $idadministrateur, $titre, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$date,$etat=true){
        $data = array(
            'idjournal'=>  $idJournal,
            'idcategorie'=> $idCategorie,
            'idadministrateur'=> $idadministrateur,
            'dateparution'=> $date,
            'titre'=> $titre,
            'extrait'=> $extrait,
            'resume'=> $resume,
            'contenue'=> $contenu,
            'laune'=> $laune,
            'etatpublication'=> $etat,
            'niveau'=> $niveau,
            'lien_image_une'=> $chemin_une
        );
        $this->db->where('idarticle',$idarticle);
        $this->db->update('article',$data);
    }
    public function deleteArticle($idarticle){
        //insertion dans une table historique
    }
    public function getUne(){
        $this->db->where('laune',1);
        $article = $this->db->get('last_journal');
        return $article->result();
    }
    public function getListArticle(){
        $this->db->where('laune<>',1);
        $articles = $this->db->get('last_journal');
        return $articles->result();
    }
    public function getSarisary(){
        $this->db->where('idcategorie',1);
        $sarisary = $this->db->get('article');
        return $sarisary->result();
    }

}
