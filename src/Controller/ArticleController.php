<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getRepository(Article::class);
        $articles = $em->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     * @param Article $article
     * @return Response
     */
    public function show(Article $article) : Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
