<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//Places classes
use App\Entity\Place;
//use App\Form\PlaceType;
use App\Repository\PlaceRepository;

//Places classes
use App\Entity\PlaceType;
use App\Repository\PlaceTypeRepository;


class PlaceController extends AbstractController {
    /**
     * @Route("/admin/places", name="places")
     */
    public function places(Request $request)
    {
		$objects=$this->getDoctrine()->getRepository(Place::class)->findAll();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Places'
		]);
    }

    /**
     * @Route("/admin/places/bars", name="bars")
     */
    public function bars(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Bar');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Bars'
		]);
    }

    /**
     * @Route("/admin/places/beaches", name="beaches")
     */
    public function beaches(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Beach');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Beaches'
		]);
    }

    /**
     * @Route("/admin/places/clubs", name="clubs")
     */
    public function clubs(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Club');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Clubs'
		]);
    }

    /**
     * @Route("/admin/places/hostings", name="hostings")
     */
    public function hostings(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Hosting');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Hostings'
		]);
    }

    /**
     * @Route("/admin/places/monuments", name="monuments")
     */
    public function monuments(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Monument');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Monuments'
		]);
    }

    /**
     * @Route("/admin/places/museums", name="museums")
     */
    public function museums(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Museum');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Museums'
		]);
    }

    /**
     * @Route("/admin/places/restaurants", name="restaurants")
     */
    public function restaurants(Request $request)
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Restaurant');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Restaurants'
		]);
    }
}