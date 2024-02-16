<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SiteController extends AbstractController{

  #[Route("/", name:"accueil")]
  public function accueil(){
    $data["h1"]= "Nos derniers modèles";
    return $this->render("front/accueil.html.twig", $data);
  }


}