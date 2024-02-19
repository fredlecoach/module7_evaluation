<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control']])

            ->add('password', PasswordType::class, ['mapped' => false,
            'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Svp, entrer votre password',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Votre pasword doit contenir au moins {{ limit }} caractères',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
            ],])
            ->add('pseudo', TextType::class,['attr' => ['class' => 'form-control']] )
            
            ->add('date_creation', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])

            ->add("creer" , SubmitType::class , ["label"=> isset($options["label"]) ? $options["label"]  : "créer" , "attr" => [ "class" => "btn btn-outline-warning mt-2 px-3" ]])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
