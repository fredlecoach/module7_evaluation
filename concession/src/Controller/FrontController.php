<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController{

  #[Route(path: "/", name:"accueil")]
  public function accueil(){
    $data = [];
    return $this->render("front/accueil.html.twig", $data);

  }

  #[Route("/connexion", name:"connexion")]
  public function connexion(){
    $data =[];
    return $this->render("front/connexion.html.twig", $data);
  }
  #[Route("/gestion_vehicule", name:"gestion_vehicule")]
  public function gestion(){
    $data =[];
    return $this->render("front/gestion_vehicule.html.twig", $data);
  }
  #[Route("/mentions_legales", name:"mentions_legales")]
  public function mentions_legales(){
    $data =[];
    return $this->render("front/mentions_legales.html.twig", $data);
  }

}