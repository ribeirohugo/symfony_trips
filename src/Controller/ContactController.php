<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Contact;
use App\Form\ContactType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

//Translation
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactController extends AbstractController {

    /**
     * @Route("/admin/contacts", name="contacts")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @return HttpFoundation\Response
     */
    public function indexAction(TranslatorInterface $trans)
    {
		$objects=$this->getDoctrine()->getRepository(Contact::class)->findAll();

        return $this->render('default/contacts.html.twig', [
            'contacts' => $objects,
			'title' => $trans->trans('Contacts')
		]);
    }

    /**
     * @Route("/admin/contact/new", name="contact_new")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @return RedirectResponse|HttpFoundation\Response
     */
    public function newContact(Request $request, TranslatorInterface $trans) {

        $object = new Contact;
		
		$form = $this->createForm(ContactType::class, $object);

		$form->handleRequest($request);

		if($form->isSubmitted()) {
			if($form->isValid()) {
				$form->getData();

				$object = $form->getData();

				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($object);
				$entityManager->flush();

				$this->addFlash('notice','<p class="alert alert-success">'.$trans->trans('Contact successfully created.').'</p>');
				
				return $this->redirectToRoute('contacts');
			} else {
				$this->addFlash('notice','<p class="alert alert-danger">'.$trans->trans('Error while creating contact.').'</p>');
			}
		}

        return $this->render('default/form.html.twig', array(
			'title' => $trans->trans('New Contact'),
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/contact/edit/{id}", name="contact_edit")
     * @param Request $request
     * @param TranslatorInterface $trans
     * @param $id
     * @return RedirectResponse|HttpFoundation\Response
     */
    public function editContact(Request $request, TranslatorInterface $trans, $id) {

		$object=$this->getDoctrine()->getRepository(Contact::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('contacts');

		$options = ['submit'=>$trans->trans('Edit')];
		$form = $this->createForm(ContactType::class, $object, $options);
		$form->handleRequest($request);

		if($form->isSubmitted()) {
			if($form->isValid()) {
				$object = $form->getData();

				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($object);
				$entityManager->flush();

				$this->addFlash('notice','<p class="alert alert-success">'.$trans->trans('Contact successfully updated.').'</p>');
				
				return $this->redirectToRoute('contacts');
			} else {
				$this->addFlash('notice','<p class="alert alert-danger">'.$trans->trans('Error while updating contact.').'</p>');
			}
		}

        return $this->render('default/form.html.twig', array(
			'title' => $trans->trans('Edit Contact'),
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/contact/delete/{id}", name="contact_delete")
     *
     * @IsGranted("ROLE_SUPER_ADMIN")
     * @param TranslatorInterface $trans
     * @param $id
     * @return RedirectResponse
     */
    public function deleteContact(TranslatorInterface $trans, $id) {

		$object=$this->getDoctrine()->getRepository(Contact::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('contacts');

		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->remove($object);
		$entityManager->flush();

		$this->addFlash('notice','<p class="alert alert-success">'.$trans->trans('Contact successfully removed.').'</p>');

        return $this->redirectToRoute('contacts');
    }

    /**
     * @Route("/admin/contacts/{id}", name="contact_id")
     * @param TranslatorInterface $trans
     * @param $id
     * @return RedirectResponse|HttpFoundation\Response
     */
    public function idContact(TranslatorInterface $trans, $id) {
		$object=$this->getDoctrine()->getRepository(Contact::class)->find($id);

		//Check if object exists
		if(empty($object))
			return $this->redirectToRoute('contacts');

        return $this->render('default/contact.html.twig', array(
			'title' => $trans->trans('Contact'),
			'object' => $object
        ));
    }

}
