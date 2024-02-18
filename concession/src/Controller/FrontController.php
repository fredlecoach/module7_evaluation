<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class FrontController extends AbstractController{
// #[Route("/" = nom du dossier où récupérer la Vue | name : "/nom du chemin dans la barre de navigation")]
  #[Route("/", name:"accueil")]
  public function accueil(){
    $data["title"] = "S.U.V Concession | accueil";
    $data["h1"]= "Nos derniers modèles";
    return $this->render("front/accueil.html.twig", $data);
  }
// ------------------------------------------------------------------------------------------------

  // #[Route("/login", name:"app_login")]
  // public function login(AuthenticationUtils $authenticationUtils) : Response {

  //   $data["title"] = "S.U.V Concession | login";
  //   $data["h1"]= "Connexion";

  //   $error = $authenticationUtils->getLastAuthenticationError();// $error renvoie à une erreur d'authentification

  //   $lastUserName = $authenticationUtils->getLastUsername();// renvoie au dernier user qui s'est authentifier

  //   return $this->render('front/login.html.twig', [ 'last_username' => $lastUserName,
  //     'error' => $error,
  // ]);

  // }

  // ------------------------------------------------------------------------------------------------
  #[Route("/mentions_legales", name:"mentions_legales")]
  public function mentions(){
    $data["title"] = "S.U.V Concession | mentions légales";
    $data["h1"]= "Mentions légales"; 
    return $this->render("front/mentions_legales.html.twig", $data);
  }

  }

