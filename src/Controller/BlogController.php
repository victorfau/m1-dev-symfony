<?php
/**
 * author : victor fau
 * contact : victorrfau@gmail.com
 * context : school
 */

namespace App\Controller;

use App\Repository\ExpoRepository;
use Symfony\Component\Routing\Annotation\Route, App\Repository\OeuvreRepository, Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class BlogController
 * @package App\Controller
 * @Route("/")
 */
class BlogController extends AbstractController {

    /**
     * @Route("/oeuvres", methods={"GET"}, name="Blog_index")
     * @param OeuvreRepository $oeuvreRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index (OeuvreRepository $oeuvreRepository){
        $oeuvres = $oeuvreRepository->findAll();
        return $this->render('Blog/index.html.twig', ['oeuvres' => $oeuvres]);
    }

    /**
     * @param OeuvreRepository $oeuvreRepository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="Blog_accueil")
     */
    public function accueil (OeuvreRepository $oeuvreRepository){
        $oeuvres = $oeuvreRepository->findBy([], [], 3);
        return $this->render('Blog/accueil.html.twig', ['oeuvres' => $oeuvres]);
    }

    /**
     * @Route("/peinture", name="blog_peinture")
     * @param OeuvreRepository $oeuvreRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function peinture (OeuvreRepository $oeuvreRepository){
        $oeuvres = $oeuvreRepository->findBy(['type' => 2]);
        return $this->render('Blog/list.html.twig', ['oeuvres' => $oeuvres, 'titre' => 'peinture']);
    }

    /**
     * @Route("/sculpture", name="blog_sculpture")
     * @param OeuvreRepository $oeuvreRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sculpture (OeuvreRepository $oeuvreRepository){
        $oeuvres = $oeuvreRepository->findBy(['type' => 1]);
        return $this->render('Blog/list.html.twig', ['oeuvres' => $oeuvres, 'titre' => 'sculpture']);
    }

    /**
     * @Route("/dessin", name="blog_dessin")
     * @param OeuvreRepository $oeuvreRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dessin (OeuvreRepository $oeuvreRepository){
        $oeuvres = $oeuvreRepository->findBy(['type' => 3]);
        return $this->render('Blog/list.html.twig', ['oeuvres' => $oeuvres, 'titre' => 'dessin']);
    }

    /**
     * @Route("/expo", name="blog_expo")
     * @param ExpoRepository $expoRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function expo (ExpoRepository $expoRepository){

        $expos = $expoRepository->findAfterNow();
        dd($expos);

        return $this->render('Blog/expo.html.twig', [

        ]);
    }
}