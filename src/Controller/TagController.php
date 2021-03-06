<?php

namespace App\Controller;

use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TagController extends AbstractController
{
    /**
     * @Route("/tag", name="tag")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getRepository(Tag::class);
        $tags = $em->findAll();
        return $this->render('tag/index.html.twig', [
            'tags' => $tags,
        ]);
    }

    /**
     * @Route("/tag/{name}", name="tag_show", methods="GET")
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag) :Response
    {
        return $this->render('tag/show.html.twig', ['tag' =>$tag]);
    }
}
