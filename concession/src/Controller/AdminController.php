<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\UserRepository;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


// #[Route('/vehiculeAdmin')]
// #[IsGranted('ROLE_USER')]
class AdminController extends AbstractController{

  

  #[Route("/gestionUser", name: "gestionUser")]
  public function gestionUser(){
    $data = [];
    return $this->render("UserAdmin/gestionUser.html.twig", $data);
  }

  // -----------------------------------------------------------------------------------

  #[Route("/ajouterUser", name: "ajouterUser")]
  public function ajouterUser(Request $request, EntityManagerInterface $em){
    $user = new User();
    $form = $this->createForm( UserType::class, $user);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
      $em->persist($user);
      $em->flush();
      return $this->redirectToRoute("gestionUser");
    }

    return $this->render("UserAdmin/ajouterUser.html.twig", ["form" => $form]);
  }
  // -------------------------------------------------------------------------------------

  #[Route(path : "/modifierUser/{id}", name: "modifierUser")]
  public function modifierUser( int $id , UserRepository $userRepository ,Request $request , EntityManagerInterface $em){
            $user = $userRepository->findOneBy([ "id" => $id ]);
      $form = $this->createForm(UserType::class , $user , ["label" => "modifier"]);
      $form->handleRequest($request) ; 
      if($form->isSubmitted() && $form->isValid()){
          $em->persist($user); 
          $em->flush();   
          return $this->redirectToRoute("gestionUser");
      }
      return $this->render("userAdmin/modifierUser.html.twig", ["form" => $form]);
  }

  // ------------------------------------------------------------------------------------

  #[Route(path : "/supprimerUser/{id}", name: "supprimerUser")]
    
  public function supprimer ( EntityManagerInterface $em, UserRepository $userRepository, int $id ){
      $user = $userRepository->findOneBy(["id" => $id]);
      $em->remove($user);
      $em->flush();
      return $this->redirectToRoute("gestionUser");
  
      }
  
// ********************************************************************************************
  // ---------***********------Partie VEHICULE CONTROLLER--------************------------------
// ********************************************************************************************

  #[Route("/gestionVehicule", name: "gestionVehicule")]
  public function gestionVehicule( VehiculeRepository $vehiculeRepository) : Response{
   $vehicules = $vehiculeRepository->findAll() ;
   return $this->render("vehiculeAdmin/gestionVehicule.html.twig", ["vehicules" => $vehicules]);
  }

  // ---------------------------------------------------------------------------------------

  #[Route("/ajouterVehicule", name: "ajouterVehicule")]
  public function ajouterVehicule(Request $request, EntityManagerInterface $em){
    $vehicule = new Vehicule();
    $form = $this->createForm( VehiculeType::class, $vehicule);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
      $em->persist($vehicule);
      $em->flush();
      return $this->redirectToRoute("gestionVehicule");
    }

    return $this->render("vehiculeAdmin/ajouterVehicule.html.twig", ["form" => $form]);
  }

  
  
  // -----------------------------------------------------------------------------------------

  #[Route(path : "/modifierVehicule/{id}", name: "modifierVehicule")]
    public function modifierVehicule(
            int $id , 
            VehiculeRepository $vehiculeRepository ,Request $request , EntityManagerInterface $em){
              $vehicule = $vehiculeRepository->findOneBy([ "id" => $id ]);
        $form = $this->createForm(VehiculeType::class , $vehicule , ["label" => "modifier"]);
        $form->handleRequest($request) ; // on récupère le $_POST et $vehicule puis on remplit le formulaire 
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($vehicule); // UPDATE SQL
            $em->flush();   // UPDATE SQL
            return $this->redirectToRoute("gestionVehicule");
        }
        return $this->render("vehiculeAdmin/modifierVehicule.html.twig", ["form" => $form]);
    }
  
    // -------------------------------------------------------------------------------------------------
  
    #[Route(path : "/supprimerVehicule/{id}", name: "supprimerVehicule")]
    
    public function delete ( EntityManagerInterface $em, VehiculeRepository $vehiculeRepository, int $id ){
        $vehicule = $vehiculeRepository->findOneBy(["id" => $id]);
        $em->remove($vehicule);
        $em->flush();
        return $this->redirectToRoute("gestionVehicule");
    
        }

}

