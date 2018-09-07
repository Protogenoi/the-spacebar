<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentAdminController extends AbstractController
{
    /**
     * @Route("/admin/comment/admin", name="comment_admin")
     */
    public function index(CommentRepository $repository, Request $request)
    {

        $q = $request->query->get('q');

        $comments = $repository->findAllWithSearch($q);

        return $this->render('comment_admin/index.html.twig', [
            'comments' => $comments,
        ]);
    }
}
