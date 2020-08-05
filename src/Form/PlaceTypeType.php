<?php namespace App\Form;

use App\Entity\Place;
use App\Entity\PlaceType;
use App\Entity\Location;

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

class PlaceTypeType extends AbstractType {
	private $t;

	private $locations;

	private $placeTypes;

	public function __construct(EntityManagerInterface $entityManager, TranslatorInterface $t) {
		$this->t = $t;
		$this->locations = $entityManager->getRepository(Location::class)->findAll();
		$this->placeTypes = $entityManager->getRepository(PlaceType::class)->findAll();
	}

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
			->add('name', TextType::class, [
				'label' => $this->t->trans('Name').' *',
				'required' => true,
				'attr' => [
					'readonly' => $options['readonly'],
					'maxlength' => 200,
					//'placeholder' => $this->t->trans('Name').' *'
				]
			])
			->add('location', EntityType::class, [
				'label' => $this->t->trans('Location'),
				'class' => Location::class,
				'choices' => $this->locations,
				'multiple' => false,
				'expanded' => false,
				'choice_label' => 'name',
				'placeholder' => 'Locations',
				'required' => true
			])
			->add('placeType', EntityType::class, [
				'label' => $this->t->trans('Place Type'),
				'class' => PlaceType::class,
				'choices' => $this->placeTypes,
				'multiple' => false,
				'expanded' => false,
				'choice_label' => 'name',
				'placeholder' => 'Place Type',
				'required' => true
			])
			->add('description', TextareaType::class, [
				'label' => $this->t->trans('Description'),
				'required' => false
			])
			->add('submit', SubmitType::class, [
				'label' => $options['submit'],
				'attr' => ['class' => 'btn btn-success']
			]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        return $resolver->setDefaults(array(
            'data_class' => Place::class,
			'readonly' => false,
			'submit' => $this->t->trans('Register')
        ));
    }
}