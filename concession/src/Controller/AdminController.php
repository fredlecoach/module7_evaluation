<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController{

  #[Route("/inscription", name: "inscription")]
  public function inscription(){
    $data["title"] = "S.U.V Concession | inscription";
    $data["h1"] = "Création compte gestionnaire";
    return $this->render("admin/inscription.html.twig", $data);

  }

  #[Route("/gestion", name: "gestion")]
  public function gestion(){
    $data["title"] = "S.U.V Concession | gestion véhicules";
    $data["h1"] = "Gestion des véhicules";
    return $this->render("admin/gestion.html.twig", $data);
  }

}