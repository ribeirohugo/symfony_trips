<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//Places classes
use App\Entity\Place;
use App\Form\PlaceTypeType;
use App\Repository\PlaceRepository;

//Places classes
use App\Entity\PlaceType;
use App\Repository\PlaceTypeRepository;

//Translation
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

class PlaceController extends AbstractController {
    /**
     * @Route("/admin/places", name="places")
     * @return Response
     */
    public function places()
    {
		$objects=$this->getDoctrine()->getRepository(Place::class)->findAll();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Places'
		]);
    }

    /**
     * @Route("/admin/places/bars", name="bars")
     * @return Response
     */
    public function bars()
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
    public function beaches()
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
    public function clubs()
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
    public function hostings()
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
    public function monuments()
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
    public function museums()
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
    public function restaurants()
    {
		$place_type=$this->getDoctrine()->getRepository(PlaceType::class)->findOneByName('Restaurant');

		$objects=$place_type->getPlaces();

        return $this->render('default/places.html.twig', [
            'places' => $objects,
			'title' => 'Restaurants'
		]);
    }

    /**
     * @Route("/admin/places/new", name="places_new")
     * @param Request $request
     * @param TranslatorInterface $t
     * @return HttpFoundation\RedirectResponse|Response
     */
    public function placesNew(Request $request, TranslatorInterface $t)
    {
        $object = new Place;
		$form = $this->createForm(PlaceTypeType::class, $object);

		$form->handleRequest($request);

		//1 - When form is submitted
		if($form->isSubmitted()) {
			if($form->isValid()) {

				//2 - Fetching form data
				$object = $form->getData();

				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($object);
				$entityManager->flush();

				$this->addFlash('notice','<p class="alert alert-success">'.$t->trans('Place successfully registered.').'</p>');
				
				return $this->redirectToRoute('places');
			} else {
				$this->addFlash('notice','<p class="alert alert-danger">'.$t->trans('Error while registering place.').'</p>');
			}
		}

        return $this->render('default/form.html.twig', [
			'title' => 'New Place',
			'form' => $form->createView()
		]);
    }

    /**
     * @Route("/admin/places/edit/{id}", name="places_edit")
     * @param Request $request
     * @param TranslatorInterface $t
     * @param $id
     * @return HttpFoundation\RedirectResponse|Response
     */
    public function placesEdit(Request $request, TranslatorInterface $t, $id)
    {
		$object=$this->getDoctrine()->getRepository(Place::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('places');

		$form = $this->createForm(PlaceTypeType::class, $object);

		$form->handleRequest($request);

		//1 - When form is submitted
		if($form->isSubmitted()) {
			if($form->isValid()) {

				//2 - Fetching form data
				$object = $form->getData();

				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($object);
				$entityManager->flush();

				$this->addFlash('notice','<p class="alert alert-success">'.$t->trans('Place successfully registered.').'</p>');
				
				return $this->redirectToRoute('places');
			} else {
				$this->addFlash('notice','<p class="alert alert-danger">'.$t->trans('Error while registering place.').'</p>');
			}
		}

        return $this->render('default/form.html.twig', [
			'title' => 'Edit Place',
			'form' => $form->createView()
		]);
    }
}
