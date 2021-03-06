<?php namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController {
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        return $this->render('default/default.html.twig', [
			'title' => 'Dashboard'
        ]);
    }
}
