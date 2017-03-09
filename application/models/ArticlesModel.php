<?php
/**
* 
*/
//create view detail_article as select article.*,categorie.libelle,categorie.niveau as level,journal.numeroparution,journal.datepublication,journal.liencouverture from article join journal on article.idjournal = journal.idjournal join categorie on article.idcategorie = categorie.idcategorie order by journal.datepublication desc
//create view article_journal as SELECT detail_article.*,journal.numeroparution,journal.datepublication,journal.liencouverture FROM `detail_article` JOIN journal on journal.idjournal = detail_article.idjournal ORDER by dateparution DESC
//create view last_journal as SELECT * from article_journal where datepublication in (SELECT max(article_journal.datepublication ) as datepublication from article_journal)

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
        $this->db->where('idarticle',$idarticle);
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
    public function update($idarticle,$data){
        $this->db->where('idarticle',$idarticle);
        $this->db->update('article',$data);
    }
    public function deleteArticle($idarticle){
        $this->db->where('idarticle',$idarticle);
        $this->db->delete('article');
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

    //fonction utilisé pour la recherche
    public function get($titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit){
        $this->db->limit($limit,$maxlimit);
        if($titre != null)
            $this->db->where('titre',$titre);
        if($rubrique!=null)
            $this->db->where('rubrique',$rubrique);
        if($contenu != null)
            $this->db->like('contenu',$contenu);
        if($resume != null)
            $this->db->like('resume',$resume);
        if($date1!=null && $date2!=null)
            $this->db->where('dateparution BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('dateparution',$date1);
        if($laune!=null)
            $this->db->where('laune',$laune);
        $article = $this->db->get('detail_article');
        return $article->result();
    }

    //recuperer les articles de j-2, par défaut, on recupère tous les rubriques. on peut aussi specifié des rubriques : ex : rubrique images seulement
    public function getIdPublicArticle($idrubrique=null){
        if($idrubrique!=null)
            $this->db->where('idcategorie',$idrubrique);
        $this->db->where('datepublication < ','now()-2');
        $articles = $this->db->get('detail_article');
        return $articles->result();
    }

    public function getArticlesByJournal($idJoournal){
        $this->db->where('idjournal',$idJoournal);
        $articles = $this->db->get('article_journal');
        return $articles->result();
    }



}
