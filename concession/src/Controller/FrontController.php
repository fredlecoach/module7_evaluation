<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController{

  #[Route("/", name:"accueil")]
  public function accueil(){
    $data["title"] = "S.U.V Concession | accueil";
    $data["h1"]= "Nos derniers modèles";
    return $this->render("front/accueil.html.twig", $data);
  }

  #[Route("/login", name:"login")]
  public function login(){
    $data["title"] = "S.U.V Concession | login";
    $data["h1"]= "Connexion";
    return $this->render("front/login.html.twig", $data);
  }

  #[Route("/mentions_legales", name:"mentions_legales")]
  public function mentions(){
    $data["title"] = "S.U.V Concession | mentions légales";
    $data["h1"]= "Mentions légales"; 
    return $this->render("front/mentions_legales.html.twig", $data);
  }

  }

