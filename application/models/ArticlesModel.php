<?php
/**
* 
*/
//create view detail_article as select article.*,categorie.libelle,categorie.niveau as level,journal.numeroparution,journal.datepublication,journal.liencouverture from article join journal on article.idjournal = journal.idjournal join categorie on article.idcategorie = categorie.idcategorie order by journal.datepublication desc
//create view article_journal as SELECT detail_article.*,journal.numeroparution,journal.datepublication,journal.liencouverture FROM `detail_article` JOIN journal on journal.idjournal = detail_article.idjournal ORDER by dateparution DESC
//create view last_journal as SELECT * from article_journal where datepublication in (SELECT max(article_journal.datepublication ) as datepublication from article_journal)
//create view article_categories as select categorie.*,categorie_mere.idcategorie as idmere, categorie_mere.libelle as catmere from categorie left JOIN assoc_sous_categorie ON categorie.idcategorie = assoc_sous_categorie.idcategorie2 left join categorie_mere on assoc_sous_categorie.idcategorie1 = categorie_mere.idcategorie
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
    public function insertArticle($idJournal, $idCategorie, $titre, $date ,$extrait, $resume, $contenu, $laune=false, $niveau, $chemin_une,$etat = true){
    	$data = array(
			'idjournal'=>  $idJournal,
			'idcategorie'=> $idCategorie,
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
    public function updateArticle($idarticle,$idJournal, $idCategorie, $titre, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$date,$etat=true){
        $data = array(
            'idjournal'=>  $idJournal,
            'idcategorie'=> $idCategorie,
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
        $this->db->trans_start();
        $this->db->where('idarticle',$idarticle);
        $this->db->update('article',$data);
        $this->db->trans_complete();
    }
    public function update($idarticle,$data){
        $this->db->where('idarticle',$idarticle);
        $this->db->update('article',$data);
    }
    public function deleteArticle($idarticle){
        $this->db->where('idarticle',$idarticle);
        $this->db->delete('article');
    }
    public function getUne($publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('laune',1);
        $article = $this->db->get('last_journal');
        return $article->result();
    }
    public function getListArticle($laune = null,$publie=null){
        if($laune == null){
            $this->db->where('laune<>',1);
        }
        if($publie != null){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idcategorie <> ',11);
        $this->db->where('idcategorie <> ',12);
        $this->db->where('idcategorie <> ',13);
        $this->db->order_by('libelle');
        $articles = $this->db->get('last_journal');
        return $articles->result();
    }
    public function getSarisary($publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idcategorie',10);
        $sarisary = $this->db->get('article');
        return $sarisary->result();
    }

    public function getById($id, $publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idarticle',$id);
        $article = $this->db->get('detail_article');
        return $article->result();
    }

    public function get2($titre=null,$date=null, $rubrique=null,$laune=null){
        if($titre!= null){
            $this->db->like('titre',$titre);
        }
        if($date!= null){
            $this->db->where('datepublication',$date);
        }
        if($rubrique!= null){
            $this->db->where('idcategorie',$rubrique);
            $this->db->or_where('idmere',$rubrique);
        }
        if($laune!= null){
            $this->db->where('laune',$laune);
        }
        $article = $this->db->get('detail_article');
        return $article->result();
    }
    //fonction utilisé pour la recherche
    public function get($idjournal=null,$titre=null,$rubrique=null,$contenu=null,$resume=null,$date1=null,$date2=null,$laune=false,$limit=null,$start=null,$ordre='DESC',$image=false,$publie=true){
        $this->db->limit($limit,$start);
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        if($idjournal!=null){
            $this->db->where('idjournal',$idjournal);
        }
        if($titre!=null && $contenu!=null && $resume!=null){
            $this->db->like('titre',$titre);
            $this->db->or_like('contenue',$contenu);
            $this->db->or_like('resume',$resume);
        }
        if($titre != null && $contenu==null && $resume==null)
            $this->db->like('titre',$titre);

        if($rubrique!=null) {
            $this->db->where('(idcategorie = '.$rubrique.' or idmere ='. $rubrique.')');
            //$this->db->or_where('idmere', $rubrique);
        }

        if($contenu!=null && $resume==null && $titre == null)
            $this->db->like('contenu',$contenu);

        if($resume != null && $contenu==null && $titre == null)
            $this->db->like('resume',$resume);

        if($date1!=null && $date2!=null)
            $this->db->where('datepublication BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('datepublication >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('datepublication <= ',date('Y-m-d', strtotime($date2)));
        if($laune!=null)
            $this->db->where('laune',$laune);
        if($image == false && $rubrique==null) {
            $this->db->where('idmere <> ', 10);
            // $this->db->where('dmere IS NULL');
        }
        $this->db->order_by('libelle',"ASC");
        $this->db->order_by('datepublication',$ordre);
        $article = $this->db->get('detail_article');
        // $sql = $this->db->get_compiled_select('detail_article');
        // die($sql);
        return $article->result();
    }

    public function getByRubrique($idRubrique, $publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idcategorie',$idRubrique);
        $this->db->or_where('idmere',$idRubrique);
        $articles = $this->db->get('article_journal');
        return $articles->result();
    }
    //recuperer les articles de j-2, par défaut, on recupère tous les rubriques. on peut aussi specifié des rubriques : ex : rubrique images seulement
    public function getIdPublicArticle($idrubrique=null){
        if($idrubrique!=null)
            $this->db->where('idcategorie',$idrubrique);
        $this->db->where('datepublication < ','now()-2');
        $articles = $this->db->get('detail_article');
        return $articles->result();
    }

    public function getArticlesByJournal($idJournal,$une = false,$publie = true){
        if($publie != null){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idjournal',$idJournal);
        $this->db->where('idcategorie <> ',11);
        $this->db->where('idcategorie <> ',12);
        $this->db->where('idcategorie <> ',13);
        $this->db->where('laune',$une);
        $articles = $this->db->get('article_journal');
        return $articles->result();
    }
    public function getAllArticleByJournal($idjournal){
        $this->db->where('idjournal',$idjournal);
        $articles = $this->db->get('article_journal');
        return $articles->result();
    }
    //Ampamoaka ampisehoana eo @ accueil
    public function getLastAmpamoaka($publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idcategorie',12);
        $this->db->order_by('datepublication','DESC');
        $this->db->limit(1);
        $ampamoaka = $this->db->get('article_journal');
        return $ampamoaka->result();
    }
    //Sarisary aseho eo @ accueil
    public function getLastSarisary($publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idcategorie',11);
        $this->db->order_by('datepublication','DESC');
        $this->db->limit(1);
        $ampamoaka = $this->db->get('article_journal');
        return $ampamoaka->result();
    }



}
