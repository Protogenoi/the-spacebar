<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 21/08/2018
 * Time: 11:14
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/")
     */

    public function homepage() {

        return new Response('My first page');

    }

    /**
     * @Route("/news/{slug}")
     */

    public function show($slug) {

        $comments = [
            'I ate a normal rock once!',
            'Do not eat rocks stupid',
            'I like bacon'
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-',' ',$slug)),
            'comments' => $comments
        ]);

    }

}