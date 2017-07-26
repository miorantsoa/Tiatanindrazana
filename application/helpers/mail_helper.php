<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 24/05/2017
 * Time: 10:43
 */
function send($to,$sujet,$message){
    $from = "no-reply@tiatanindrazana.com";
    $CI = & get_instance();
    $config = Array(
        'mailtype'  => 'html',
        'charset'   => 'utf-8'
    );
    $header = null;
    $value = null;
    $CI->load->library('email'
        , $config);
    $CI->load->library('email', $config);
    $CI->email->from($from, 'Tia Tanindrazana');
    $CI->email->set_header($header, $value);
    $CI->email->to($to);
    $CI->email->subject($sujet);
    $CI->email->message($message);
    $CI->email->send();
}

function send_confirmation($id_user){
    $CI = & get_instance();
    $CI->load->model('abonneemodel');
    $abonnee = $CI->abonneemodel->getAbonneeById($id_user);
    if(count($abonnee)!=0){
        $nom = $abonnee[0]->nomutilisateur;
        $prenom = $abonnee[0]->prenomutilisateur;
        $to = $abonnee[0]->emailutilisateur;
        $sujet = "Confirmation activation du compte";
        $message = "<p>Bonjour ".$nom." ".$prenom.",</p>";
        $message .= "<p>Votre compte vient d'être activé</p>";
        $message .="<p>Voici vos information de connexion : </p>";
        $message .="<p>Email : ".$to."</p>";
        $message .="<p>Mot de passe : le mot de passe que vous avez choisis</p>";
        $message .="<p>Pour acceder a votre compte veuiller vous rendre sur:</p>";
        $message .="<p><a href='<?= base_url('accueil/connection')?>'>http://www.tiatanindrazana.com/v2/accueil/connection</a></p>";
        $message .="Tia tanindrazana";
        $message .="Siège : Soenerana Immeuble Vidy Varotra";
        $message .="Nous vous remercions";
        send($to,$sujet, $message);
    }
}

function send_fin_abonnement($id_user){
    $CI = & get_instance();
    $CI->load->model('abonneemodel');
    $abonnee = $CI->abonneemodel->getAbonneeById($id_user);
    if(count($abonnee)!=0){
        $nom = $abonnee[0]->nomutilisateur;
        $prenom = $abonnee[0]->prenomutilisateur;
        $to = $abonnee[0]->emailutilisateur;
        $sujet = "Fin abonnement";
        $message = "<p>Bonjour ".$nom." ".$prenom.",</p>";
        $message .= "<p>Votre abonnement compte Tia tanindrazana a expiré, et votre compte à été désactivé.</p>";
        $message .="<p>Si vous voulez renouveler votre abonnement , veuillez suivre <a href='".base_url('accueil/choixTarif/'.$id_user)."'>ce lien</a></p>";
        $message .="<p>Merci de votre fidélité</p>";
        send($to,$sujet, $message);
    }
}