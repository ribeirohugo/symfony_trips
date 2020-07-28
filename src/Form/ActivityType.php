<?php namespace App\Form;

use App\Entity\Activity;
use App\Entity\Region;

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

class ActivityType extends AbstractType {
	private $t;

	public function __construct(EntityManagerInterface $entityManager, TranslatorInterface $t) {
		$this->t = $t;
		$this->regions = $entityManager->getRepository(Region::class)->findAll();
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
			->add('description', TextareaType::class, [
				'label' => $this->t->trans('Description'),
				'required' => false
			])
			/*->add('Region', EntityType::class, [
				'label' => $this->t->trans('Region'),
				'class' => Region::class,
				'choices' => $this->companies,
				'multiple' => true,
				'expanded' => false,
				'choice_label' => 'name',
				'placeholder' => 'Region',
				'required' => false
			])*/
			->add('submit', SubmitType::class, [
				'label' => $options['submit'],
				'attr' => ['class' => 'btn btn-success']
			]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        return $resolver->setDefaults(array(
            'data_class' => Activity::class,
			'readonly' => false,
			'submit' => $this->t->trans('Register')
        ));
    }
}