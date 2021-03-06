<?php

namespace App\Form;

use App\Entity\Aloite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinkkiFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('Aihe', TextType::class, ['label' => 'Aloitteen aihe', 'attr' => ['size' => '50']])
            ->add('Kuvaus', TextType::class, ['label' => 'Kirjoita aloitteesi', 'attr' => ['size' => '75']])
            ->add('Etunimi', null, ['required' => false])
            ->add('Sukunimi', TextType::class)
            ->add('Email', TextType::class)
            ->add('Kirjauspvm', TextType::class, ['label' => 'Kirjauspäivämäärä'])
            ->add('Save', SubmitType::class, ['label' => 'Tallenna', 'attr' => array('class' => 'btn btn-info mt-3')]);

    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data-class' => Aloite::class,
        ]);
    }
}

?>