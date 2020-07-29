<?php namespace App\Form;

use App\Entity\Contact;
use App\Entity\Place;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityManagerInterface;

//Translation
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactType extends AbstractType {
	private $t;
	private $places;

	public function __construct(EntityManagerInterface $entityManager, TranslatorInterface $t) {
		$this->t = $t;
		$this->places = $entityManager->getRepository(Place::class)->findAll();
	}

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
			->add('name', TextType::class, [
				'label' => $this->t->trans('Nome').' *',
				'required' => true,
				'attr' => [
					'readonly' => $options['readonly'],
					'maxlength' => 200,
					//'placeholder' => $this->t->trans('Nome').' *'
				]
			])
			->add('email', EmailType::class, [
				'label' => $this->t->trans('E-Mail').' *',
				'required' => true,
				'attr' => [
					'readonly' => $options['readonly'],
					'maxlength' => 200,
					//'placeholder' => $this->t->trans('E-Mail').' *'
				]
			])
			->add('phone', TextType::class, [
				'label' => $this->t->trans('Phone'),
				'required' => false,
				'attr' => [
					'maxlength' => 15,
					//'placeholder' => $this->t->trans('Phone').' *'
				]
			])
			->add('phone2', TextType::class, [
				'label' => $this->t->trans('Phone').' 2',
				'required' => false,
				'attr' => [
					'maxlength' => 15,
					//'placeholder' => $this->t->trans('Phone').' 2'
				]
			])
			->add('description', TextareaType::class, [
				'label' => $this->t->trans('Description'),
				'required' => false
			])
			/*->add('place', EntityType::class, [
				'label' => $this->t->trans('Place'),
				'class' => Place::class,
				'choices' => $this->companies,
				'multiple' => true,
				'expanded' => false,
				'choice_label' => 'name',
				'placeholder' => 'Place',
				'required' => false
			])*/
			->add('skype', TextType::class, [
				'label' => 'Skype',
				'required' => false,
				'attr' => [
					'maxlength' => 150,
					//'placeholder' => 'Skype'
				]
			])
			->add('submit', SubmitType::class, [
				'label' => $options['submit'],
				'attr' => ['class' => 'btn btn-success']
			]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        return $resolver->setDefaults(array(
            'data_class' => Contact::class,
			'readonly' => false,
			'submit' => $this->t->trans('Registar')
        ));
    }
}