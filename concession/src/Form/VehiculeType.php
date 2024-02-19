<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['attr' => ["class"=>"form-control"]] )
            ->add('modele',TextType::class, ['attr' => ["class"=>"form-control"]])
            ->add('description', TextType::class, ['attr' => ["class"=>"form-control"]])
            ->add('date_creation', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('image', FileType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false, // assuming the image is optional
            ])
            ->add('en_vente', CheckboxType::class, [ 'required' => false, // assuming en_vente is optional
            'attr' => ['class' => 'form-check-input'] // use form-check-input for checkboxes in Bootstrap
            ])

            ->add("creer" , SubmitType::class , ["label"=> isset($options["label"]) ? $options["label"]  : "créer" , "attr" => [ "class" => "btn btn-outline-warning mt-2 px-3" ]])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
