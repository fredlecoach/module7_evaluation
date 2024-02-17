<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminController extends AbstractController{

  #[Route("/inscription", name: "inscription")]
  public function inscription(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager){

    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    //on vient récupérer les infos du formulaire usertype qui se trouve dans le dossier Form et on le stock dans une variable qu'on a nommé $form
    $form->handleRequest($request); // stocke ce que l'utilisateur écrira

    if($form->isSubmitted() && $form->isValid())
    //si les infos sont soumises ou envoyées et que le formulaire est valide alors{}
    {
      $user->setPassword($userPasswordHasher->hashPassword( $user, $form->get('plainPassword')->getData()
    ));

    $entityManager->persist($user);
    $entityManager->flush();

    return $this->redirectToRoute("admin/gestion.html.twig");//si tout est valide =>renvoie vers la page de gestion
    }

    $data = [];
    return $this->render("admin/inscription.html.twig", $data);

  }

  // --------------------------------------------------------------------------------

  #[Route("/gestion", name: "gestion")]
  public function gestion(){
    $data = [];
    return $this->render("admin/gestion.html.twig", $data);
  }
  
// ------------------------------------------------------------------------------------

  #[Route(path: '/logout', name: 'app_logout')]
  public function logout(): void
  {
      throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
  }

  #[Route("/user-gestion", name: "user-gestion")]
  public function userGestion(){
    $data = [];
    return $this->render("admin/user-gestion.html.twig", $data);
  }

}