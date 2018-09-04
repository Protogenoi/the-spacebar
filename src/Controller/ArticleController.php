<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 21/08/2018
 * Time: 11:14
 */

namespace App\Controller;

use App\Entity\Article;
use App\Service\SlackClient;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * Currently unused: just showing a controller with a constructor!
     */
    private $isDebug;

    public function __construct(bool $isDebug)
    {

        $this->isDebug = $isDebug;
    }

    /**
     * @Route("/", name="app_homepage")
     */

    public function homepage(EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Article::class);
        dump($repository);die;
        $articles = $repository->findBy([],['publishedAt' => 'DESC']);

        return $this->render('article/homepage.html.twig', [
            'articles' => $articles,
        ]);

    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */

    public function show($slug, SlackClient $slack, EntityManagerInterface $em)
    {

        if ($slug === 'khaaaaaan') {
            $slack->sendMessage('Khan', 'Ah, Kirk, my old friend...');

        }

        $repository = $em->getRepository(Article::class);
        /** @var  Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);
        if(!$article) {
            throw $this->createNotFoundException(sprintf('No article for slug "%s"',$slug));
        }

        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {

        $logger->info('Article is being hearted!');

        return $this->json(['hearts' => rand(5, 100)]);

    }

}