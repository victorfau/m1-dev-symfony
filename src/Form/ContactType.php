<?php
/**
 * author : victor fau
 * contact : victorrfau@gmail.com
 * context : school
 */

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Contact;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType {
    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder->add('mail', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
			            'message' => "Le message est obligatoire"
		            ]),
		            new Length([
			            'min' => 5,
			            'minMessage' => "Le message doit comporter {{ limit }} caractères au minimum"
		            ])
	            ]
            ])
            ->add('message', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
			            'message' => "Le message est obligatoire"
		            ]),
		            new Length([
			            'min' => 20,
			            'minMessage' => "Le message doit comporter {{ limit }} caractères au minimum"
		            ])
	            ]
            ]);
    }

    public function configureOptions (OptionsResolver $resolver){
        $resolver->setDefaults(['data_class' => Contact::class,]);
    }
}
