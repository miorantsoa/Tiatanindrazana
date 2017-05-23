<?php

function get_url_tag($cat,$var,$date,$id){
    $var = str_replace(' ','-',$var);
    $var = preg_replace('/[^A-Za-z0-9\-]/', '', $var);
    $cat = tag_categorie($cat);
    $res = strtolower($cat).'/';
    $res.= $var;
    $res .= "-".$date;
    $res .= "-".$id;
    return $res;
}

function add_url_tag_article($cat,$titre, $date, $id){
    $CI = & get_instance();
    $CI->load->model('articlesmodel');
    $url = get_url_tag($cat, $titre, $date, $id);
    $toUpdate['url_tag'] = $url;
    $CI->articlesmodel->update($id, $toUpdate);
}

function add_url_tag(){
    $CI = & get_instance();
    $CI->load->model('articlesmodel');
    $articles = $CI->articlesmodel->get2();
    // var_dump($articles);die();
    if(count($articles)!=0){
        foreach ($articles as $article) {
            $url_tag = get_url_tag($article->libelle,$article->titre,replace_sep(reformat_date($article->dateparution,'d-m-Y')),$article->idarticle);
            $toUpdate['url_tag'] = $url_tag;
            $CI->articlesmodel->update($article->idarticle, $toUpdate);
        }
    }
}

function add_url_tag_ilaiko(){
     $CI = & get_instance();
    $CI->load->model('infoutilemodel');
    $ilaiko= $CI->infoutilemodel->get();
    if(count($ilaiko)!=0){
        foreach($ilaiko as $item){
            $url_tag = get_url_tag($item->libelle,$item->titre,'',$item->idbeinfo);
            $toUpdate['url_tag'] = $url_tag;
            $CI->infoutilemodel->update($item->idbeinfo, $toUpdate);

        }
    }
}

function reformat_date($date,$format){
    $date_obj = date_create($date);
    $new_format = date_format($date_obj,$format);
    return $new_format;
}
function reformat($date){
    return reformat_date($date,'d-m-Y');
}

function replace_sep($date){
    $date = str_replace('-','',$date);
    return $date;
}

function tag_categorie($cat){
    $cat = str_replace("'","",$cat);
    return str_replace(" ","-",$cat);
}