<?php
class Paiement {
    private $CI;
    private $public_key;
    private $private_key;
    private $client_id;
    private $client_secret;
    private $util;
    private $site_url;
    private $token=null;
    const URL_AUTH = "http://localhost/ariaryplatform/web/app.php/oauth/v2/token";
    const URL_PAIEMENT = "http://localhost/ariaryplatform/web/app.php/api/paiements";
    const URL_RESULTAT = "http://localhost/ariaryplatform/web/app.php/api/resultats";
    const URL_PAIE =  "http://localhost/ariary2copie/web/app_dev.php/paiement/";
	const URL_RESULT_PAIE = "http://localhost/ariary2copie/web/app_dev.php/paiement_resultat";
	
    /**
     * Paiement constructor.
     * @param $public_key
     * @param $private_key
     * @param $client_id
     * @param $client_secret
     * @param $site_url
     * @param Util $util
     */
    public function __construct($public_key, $private_key, $client_id, $client_secret){
        $this->CI = & get_instance();
        $this->public_key = $public_key;
        $this->private_key = $private_key;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->site_url=base_url();
        $this->CI->load->library('util');
    }


    /**
     * @return mixed
     */
    private function getAccess(){
        if($this->token!=null)return $this->token;
        $param=array(
            'client_id'=>$this->client_id,
            'client_secret'=>$this->client_secret,
            'grant_type'=>'client_credentials'
        );
        $json= json_decode($this->CI->util->sendCurl(self::URL_AUTH,"POST",array(),$param));
        if(isset($json->error)){
            throw new Exception($json->error.": ".$json->error_description);
        }
        $this->token=$json->access_token;
        return $json->access_token;
    }
	
    /**
     * @param $url
     * @param array $params_to_send
     * @return bool|int|string
     */
    private function send($url,array $params_to_send){
        $params_crypt=$this->CI->util->crypter($this->public_key,json_encode($params_to_send));
        $params=array(
            "site_url"=>$this->site_url,
            "params"=>$params_crypt
        );
        $headers=array("Authorization:Bearer ".$this->getAccess());
        $json=$this->CI->util->sendCurl($url,"POST",$headers,$params);
        $error=json_decode($json);
        if(isset($error->error)){
            throw new Exception($error->error.": ".$error->error_description);
        }
        return $this->CI->util->decrypter($this->private_key,$json);
    }

	/**
     * @param $idpanier
     * @param $montant
     * @param $nom
     * @param $reference
     * @param $adresseip
     * @return bool|int|string
     */
    public function initPaie($idpanier,$montant,$nom,$reference,$adresseip){
        $now=new DateTime();
        $params=array(
            "unitemonetaire"=>"Ar",
            "adresseip"=>$adresseip,
            "date"=>$now->format('Y-m-d H:i:s'),
            "idpanier"=>$idpanier,
            "montant"=>$montant,
            "nom"=>$nom,
            "reference"=>$reference
        );
        $id=$this->send(self::URL_PAIEMENT,$params);
//        return new RedirectResponse(self::URL_PAIE.$id);
        redirect(self::URL_PAIE.$id);
    }

    /**
     * @param $idpaiement
     * @return bool|int|string
     */
    public function resultPaie($idpaiement){
        $idpaiement=$this->CI->util->decrypter($this->private_key,$idpaiement);
        $params=array(
            "idpaiement"=>$idpaiement
        );
        $res=$this->send(self::URL_RESULT_PAIE,$params);
        return json_decode($res);
    }

}