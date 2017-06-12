<?php
/**
* 
*/
class ArticlesModel extends CI_Model {
    /**
     * ArticlesModel constructor.
     */
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
        $this->requete_article();
        $this->db->where('idcategorie',$idRubrique);
        $article = $this->db->get();
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

    /**
     * @param $date
     * @return mixed
     */
    public function getArticleByDate($date){
        $this->requete_article();
        $this->db->where('dateparution',$date);
        $article =  $this->db->get();
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
        $this->db->trans_start();
        $this->db->insert("article",$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }


    /**
     * @param $idarticle
     * @param $idJournal
     * @param $idCategorie
     * @param $titre
     * @param $extrait
     * @param $resume
     * @param $contenu
     * @param $laune
     * @param $niveau
     * @param $chemin_une
     * @param $date
     * @param bool $etat
     */
    public function updateArticle($idarticle, $idJournal, $idCategorie, $titre, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une, $date, $etat=true){
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

    /**
     * @param $idarticle
     * @param $data
     */
    public function update($idarticle, $data){
        $this->db->where('idarticle',$idarticle);
        $this->db->update('article',$data);
    }

    /**
     * @param $idarticle
     */
    public function deleteArticle($idarticle){
        $this->db->where('idarticle',$idarticle);
        $this->db->delete('article');
    }

    /**
     * @param bool $publie
     * @return mixed
     */
    public function getUne($publie = true){
        $this->requete_article();
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('dateparution = (SELECT max(dateparution) FROM article)');
        $this->db->where('laune',1);
        $article = $this->db->get();
        return $article->result();
    }

    /**
     * @param null $laune
     * @param null $publie
     * @return mixed
     */
    public function getListArticle($laune = null, $publie=null){
        $this->requete_article();
        $this->db->where('dateparution = (SELECT max(dateparution) FROM article)');
        if($laune == null){
            $this->db->where('laune<>',1);
        }
        if($publie != null){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('isnull(assoc_sous_categorie.idcategorie1) or `assoc_sous_categorie`.`idcategorie1` <> 10 ');
        $this->db->order_by('laune, libelle');
        $articles = $this->db->get();
        /*$sql = $this->db->get_compiled_select();
         die($sql);*/
        return $articles->result();
    }

    /**
     * @param bool $publie
     * @return mixed
     */
    public function getSarisary($publie = true){
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idcategorie',10);
        $sarisary = $this->db->get('article');
        return $sarisary->result();
    }

    /**
     * @param $id
     * @param bool $publie
     * @return mixed
     */
    public function getById($id, $publie = true){
        $this->requete_article();
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('idarticle',$id);
        $article = $this->db->get();
        return $article->result();
    }

    /**
     * @param null $titre
     * @param null $date
     * @param null $rubrique
     * @param null $laune
     * @return mixed
     */
    public function get2($titre=null, $date=null, $rubrique=null, $laune=null){
        $this->requete_article();
        if($titre!= null){
            $this->db->like('titre',$titre);
        }
        if($date!= null){
            $this->db->where('datepublication',$date);
        }
        if($rubrique!= null){
            $this->db->where('article.idcategorie',$rubrique);
            $this->db->or_where('assoc_sous_categorie`.`idcategorie1',$rubrique);
        }
        if($laune!= null){
            $this->db->where('laune',$laune);
        }
        $article = $this->db->get();
        return $article->result();
    }
    //fonction utilisé pour la recherche
    /**
     * @param null $idjournal
     * @param null $titre
     * @param null $rubrique
     * @param null $contenu
     * @param null $resume
     * @param null $date1
     * @param null $date2
     * @param bool $laune
     * @param null $limit
     * @param null $start
     * @param string $ordre
     * @param bool $image
     * @param bool $publie
     * @return mixed
     */
    public function get($idjournal=null, $titre=null, $rubrique=null, $contenu=null, $resume=null, $date1=null, $date2=null, $laune=false, $limit=null, $start=null, $ordre='DESC', $image=false, $publie=true){
        $this->requete_article();
        $this->db->limit($limit,$start);
        if($laune!=null || $laune!=false) {
            $this->db->where('article.laune', true);
        }
        if ($laune == false){
            $this->db->where('article.laune', false);
        }
        if($ordre == null){
            $ordre = "DESC";
        }
        if($publie == true){
            $this->db->where('article.etatpublication',true);
        }
        if($idjournal!=null){
            $this->db->where('journal.idjournal',$idjournal);
        }
        if($titre!=null && $contenu!=null && $resume!=null){
            $this->db->like('article.titre',$titre);
            $this->db->or_like('article.contenue',$contenu);
            $this->db->or_like('article.resume',$resume);
        }
        if($titre != null && $contenu==null && $resume==null)
            $this->db->like('article.titre',$titre);

        if($rubrique!=null) {
            $this->db->where('(article.idcategorie = '.$rubrique.' or assoc_sous_categorie.idcategorie1 ='. $rubrique.')');
            //$this->db->or_where('idmere', $rubrique);
        }

        if($contenu!=null && $resume==null && $titre == null)
            $this->db->like('article.contenu',$contenu);

        if($resume != null && $contenu==null && $titre == null)
            $this->db->like('article.resume',$resume);

        if($date1!=null && $date2!=null)
            $this->db->where('journal.datepublication BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('journal.datepublication >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('journal.datepublication <= ',date('Y-m-d', strtotime($date2)));
        if($image == false && $rubrique==null) {
            $this->db->where('isnull(assoc_sous_categorie.idcategorie1) or `assoc_sous_categorie`.`idcategorie1` <> 10 ');
            // $this->db->where('dmere IS NULL');
        }
        $this->db->order_by('libelle',"DESC");
        $this->db->order_by('datepublication',$ordre);
        $article = $this->db->get();
       /* var_dump($ordre);
        $sql = $this->db->get_compiled_select();
         die($sql);*/
        return $article->result();
    }

    /**
     * @param $idRubrique
     * @param bool $publie
     * @return mixed
     */
    public function getByRubrique($idRubrique, $publie = true){
        $this->requete_article();
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('article.idcategorie',$idRubrique);
        $this->db->or_where('assoc_sous_categorie.idcategorie1',$idRubrique);
        /*$sql = $this->db->get_compiled_select();
        die($sql);*/
        $articles = $this->db->get();
        return $articles->result();
    }
    //recuperer les articles de j-2, par défaut, on recupère tous les rubriques. on peut aussi specifié des rubriques : ex : rubrique images seulement
    /**
     * @param null $idrubrique
     * @return mixed
     */
    public function getIdPublicArticle($idrubrique=null){
        $this->requete_article();
        if($idrubrique!=null)
            $this->db->where('article.idcategorie',$idrubrique);
        $this->db->where('datepublication < ','now()-2');
        $articles = $this->db->get();
        return $articles->result();
    }

    /**
     * @param $idJournal
     * @param bool $une
     * @param bool $publie
     * @return mixed
     */
    public function getArticlesByJournal($idJournal, $une = false, $publie = true){
        $this->requete_article();
        if($publie != null){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('journal.idjournal',$idJournal);
        $this->db->where('(isnull(assoc_sous_categorie.idcategorie1) or `assoc_sous_categorie`.`idcategorie1` <> 10 )');
        $this->db->where('laune',$une);
//        die($this->db->get_compiled_select());
        $articles = $this->db->get();
        return $articles->result();
    }

    /**
     * @param $idjournal
     * @return mixed
     */
    public function getAllArticleByJournal($idjournal){
        $this->requete_article();
        $this->db->where('article.idjournal',$idjournal);
        $articles = $this->db->get();
        return $articles->result();
    }
    //Ampamoaka ampisehoana eo @ accueil
    /**
     * @param bool $publie
     * @return mixed
     */
    public function getLastAmpamoaka($publie = true){
        $this->requete_article();
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('article.idcategorie',12);
        $this->db->order_by('datepublication','DESC');
        $this->db->limit(1);
        $ampamoaka = $this->db->get();
        return $ampamoaka->result();
    }
    //Sarisary aseho eo @ accueil
    /**
     * @param bool $publie
     * @return mixed
     */
    public function getLastSarisary($publie = true){
        $this->requete_article();
        if($publie == true){
            $this->db->where('etatpublication',true);
        }
        $this->db->where('article.idcategorie',11);
        $this->db->order_by('datepublication','DESC');
        $this->db->limit(1);
        $ampamoaka = $this->db->get();
        return $ampamoaka->result();
    }

    /**
     *
     */
    public function requete_article(){
        $this->db->select("
            article.idarticle,
            article.titre,
            article.idcategorie,
            article.contenue,
            article.niveau,
            article.resume,
            article.etatpublication,
            article.extrait,
            article.laune,
            article.lien_image_une,
            article.url_tag,
            article.titre,
            categorie.libelle,
            categorie.niveau,
            article.dateparution,
            journal.idjournal,
            journal.liencouverture,
            journal.datepublication,
            journal.numeroparution,
            assoc_sous_categorie.idcategorie1 as catmere"
        );
        $this->db->from('article');
        $this->db->join('categorie', 'article.idcategorie = categorie.idcategorie');
        $this->db->join('journal ', 'article.idjournal = journal.idjournal');
        $this->db->join('assoc_sous_categorie', 'categorie.idcategorie = assoc_sous_categorie.idcategorie2','left');
    }


}
