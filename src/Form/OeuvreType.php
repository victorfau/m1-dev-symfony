<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OeuvreType extends AbstractType {
    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder->add('name', TextareaType::class, [
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
            ->add('description', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
			            'message' => "Le message est obligatoire"
		            ]),
		            new Length([
			            'min' => 20,
			            'minMessage' => "Le message doit comporter {{ limit }} caractères au minimum"
		            ])
	            ]
            ])
            ->add('image', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
			            'message' => "Le message est obligatoire"
		            ]),
		            new Length([
			            'min' => 20,
			            'minMessage' => "Le message doit comporter {{ limit }} caractères au minimum"
		            ]),
	            ],
                'attr' => [
                    'placeholder' => 'URL de l\'image',
                    ]
                // url de l'image par manque de temps.
            ])
            ->add('type', EntityType::class, [/*
                 * EntityType : champ de formulaire relié à une entité
                 *  - class : entité en relation
                 *  - choice_label : choix d'une propriété de l'entité à afficher
                 *  - multiple : sélection de plusieurs choix; par défaut false
                 *  - expanded : affichage de plusieurs champs; par défaut false
                 *      multiple : false > expanded : false = select
                 *      multiple : false > expanded : true = boutons radio
                 *      multiple : true > expanded : true = cases à cocher
                 *      multiple : true > expanded : false = menu
                 *  - contraintes pour les cases à cocher
                 *      Count: comptage du nombre de sélection
                 */ 'class' => Category::class, 'choice_label' => 'name', 'multiple' => false, 'expanded' => false]);
    }

    public function configureOptions (OptionsResolver $resolver){
        $resolver->setDefaults(['data_class' => Oeuvre::class,]);
    }
}
