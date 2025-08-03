<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'attr' => [ 'class' => "form-control"],
                'label' => 'Company Name',
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('contactName', TextType::class, [
                'attr' => [ 'class' => "form-control"],
                'label' => 'Contact Name',
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [ 'class' => "form-control"],
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('phone', TextType::class, [
                'required' => false,
                'attr' => [ 'class' => "form-control"],
                'label' => 'Phone number',
                'label_attr' => [
        'class' => 'form-label']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
