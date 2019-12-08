<?php
/**
 * author : victor fau
 * contact : victorrfau@gmail.com
 * context : school
 */

/**
 * author : victor fau
 * contact : victorrfau@gmail.com
 * context : school
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Oeuvre;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\OeuvreType;
use App\Repository\ExpoRepository;
use App\Repository\OeuvreRepository;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin")
 */
class AdminController extends AbstractController {
    /**
     *@Route("/oeuvres", name="admin_oeuvres")
     * @param OeuvreRepository       $oeuvreRepository
     * @param Request                $request
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function oeuvres (OeuvreRepository $oeuvreRepository, Request $request, EntityManagerInterface $em){
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($oeuvre);
            $em->flush();

            unset($oeuvre, $form);
            $entity = new Oeuvre();
            $form = $this->createForm(OeuvreType::class, $entity);
        }

        $oeuvres = $oeuvreRepository->findAll();
        return $this->render('Admin/oeuvres.html.twig', ['form' => $form->createView(), 'oeuvres' => $oeuvres]);
    }
}