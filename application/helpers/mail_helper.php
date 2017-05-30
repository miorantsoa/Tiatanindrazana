<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 24/05/2017
 * Time: 10:43
 */
function send($to,$sujet,$message){
    $from = "miorantsoa.apsesame2013@gmail.com";
    $CI = & get_instance();
    $config = Array(
        'mailtype'  => 'html',
        'charset'   => 'utf-8'
    );
    $CI->load->library('email', $config);
    $CI->email->from($from, 'Tia Tanindrazana Server');
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
        send($to,$sujet, $message);
    }
}