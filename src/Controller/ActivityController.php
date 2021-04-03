<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;

//Translation
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

//Annotations to define role permissions
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ActivityController extends AbstractController {

    /**
     * @Route("/admin/activities", name="activities")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
		$objects=$this->getDoctrine()->getRepository(Activity::class)->findAll();

        return $this->render('default/activities.html.twig', [
            'activities' => $objects,
			'title' => 'Activities'
		]);
    }

    /**
     * @Route("/admin/activity/new", name="activity_new")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @return RedirectResponse|Response
     */
    public function newActivity(Request $request, TranslatorInterface $trans) {

        $object = new Activity;
		
		$form = $this->createForm(ActivityType::class, $object);

		$form->handleRequest($request);

		if($form->isSubmitted()) {
			if($form->isValid()) {
				$form->getData();

				$object = $form->getData();

				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($object);
				$entityManager->flush();

				$this->addFlash('notice','<p class="alert alert-success">'.$trans->trans('Activity successfully created.').'</p>');
				
				return $this->redirectToRoute('activities');
			} else {
				$this->addFlash('notice','<p class="alert alert-danger">'.$trans->trans('Error while creating activity.').'</p>');
			}
		}

        return $this->render('default/form.html.twig', array(
			'title' => $trans->trans('New Activity'),
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/activity/edit/{id}", name="activity_edit")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @param $id
     * @return RedirectResponse|Response
     */
    public function editActivity(Request $request, TranslatorInterface $trans, $id) {

		$object=$this->getDoctrine()->getRepository(Activity::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('activities');

		$options = ['submit'=>$trans->trans('Edit')];
		$form = $this->createForm(ActivityType::class, $object, $options);
		$form->handleRequest($request);

		if($form->isSubmitted()) {
			if($form->isValid()) {
				$object = $form->getData();

				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($object);
				$entityManager->flush();

				$this->addFlash('notice','<p class="alert alert-success">'.$trans->trans('Activity successfully updated.').'</p>');
				
				return $this->redirectToRoute('activities');
			} else {
				$this->addFlash('notice','<p class="alert alert-danger">'.$trans->trans('Error while updating activity.').'</p>');
			}
		}

        return $this->render('default/form.html.twig', array(
			'title' => $trans->trans('Edit Activity'),
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/activity/delete/{id}", name="activity_delete")
     *
     * @IsGranted("ROLE_SUPER_ADMIN")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @param $id
     * @return RedirectResponse
     */
    public function deleteActivity(Request $request, TranslatorInterface $trans, $id) {

		$object=$this->getDoctrine()->getRepository(Activity::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('activities');

        if($object->hasContacts()) {
            $this->addFlash('notice','<p class="alert alert-danger">'.$trans->trans('not_possible_activity_has_contacts').'</p>');
            return $this->redirectToRoute('activities');
        }

		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->remove($object);
		$entityManager->flush();

		$this->addFlash('notice','<p class="alert alert-success">'.$trans->trans('Activity successfully removed.').'</p>');

        return $this->redirectToRoute('activities');
    }

    /**
     * @Route("/admin/activity/{id}", name="activity_id")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @param $id
     * @return RedirectResponse|Response
     */
    public function singleActivity(Request $request, TranslatorInterface $trans, $id) {
		$object=$this->getDoctrine()->getRepository(Activity::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('activities');

        return $this->render('default/activity.html.twig', array(
			'title' => $trans->trans('Activity'),
			'activity' => $object
        ));
    }

}
