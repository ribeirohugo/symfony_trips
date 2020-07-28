<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController {
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/default.html.twig', [
			'title' => 'Dashboard'
        ]);
    }
}