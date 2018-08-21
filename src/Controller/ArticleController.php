<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 21/08/2018
 * Time: 11:14
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController
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

        return new Response(sprintf(
            'Future page to show the article: %s',
            $slug
        ));

    }

}