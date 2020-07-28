<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\ActivityRepository;
use App\Entity\Activity;

class ActivityController extends AbstractController {
    /**
     * @Route("/admin/activities", name="activities")
     */
    public function indexAction(Request $request)
    {
		$objects=$this->getDoctrine()->getRepository(Activity::class)->findAll();

        return $this->render('default/activities.html.twig', [
            'activities' => $objects,
			'title' => 'Activities'
		]);
    }
}