<?php

namespace App\Controller;

use App\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Image;
use App\Form\ImageFormType;

class ImageController extends AbstractController
{
    // /**
    //  * @Route("/image", name="image")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('image/newImage.html.twig', [
    //         'controller_name' => 'ImageController',
    //     ]);
    // }

     /**
     * @Route("image/new", name="image_new")
     */

    public function newImage(Request $request)
    {
        $image = new Image();
        $form = $this->createForm(ImageFormType::class, $image);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($image);
           $entityManager->flush();
        // $entityManager = $this->getDoctrine()-getManager();
        // $entityManager->persist($image);
        // $entityManager->flush();
    }
    return $this->render('image/newImage.html.twig', [
        'form' =>$form->createView()
    ]);

  }

  /**
     * @Route("image/commentaire", name="image_new")
     */
  public function commentaire(Request $request)
    {
        $comm = new Commentaire();
        $form = $this->createForm(ImageFormType::class, $comm);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($comm);
           $entityManager->flush();
        // $entityManager = $this->getDoctrine()-getManager();
        // $entityManager->persist($image);
        // $entityManager->flush();
    }
    return $this->render('image/index.html.twig', [
        'form' =>$form->createView()
    ]);

  }
}
