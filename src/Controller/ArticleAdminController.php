<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 03/09/2018
 * Time: 17:58
 */

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 */


class ArticleAdminController extends AbstractController
{

    /**
     * @Route("/admin/article/new", name="admin_article_new")
     */

    public function new(EntityManagerInterface $em)
    {

    die('todo');

        return new Response(sprintf(
            'Hiya! New article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }

}