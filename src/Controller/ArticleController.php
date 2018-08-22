<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 21/08/2018
 * Time: 11:14
 */

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/", name="app_homepage")
     */

    public function homepage() {

        return $this->render('article/homepage.html.twig');

    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */

    public function show($slug) {

        $comments = [
            'I ate a normal rock once!',
            'Do not eat rocks stupid',
            'I like bacon'
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-',' ',$slug)),
            'comments' => $comments,
            'slug' => $slug
        ]);

    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {

        $logger->info('Article is being hearted!');

        return $this->json(['hearts' => rand(5,100)]);

    }

}