<?php

namespace App\Form;

use App\Entity\Aloite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AloiteFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('aihe', TextType::class, ['label' => 'Aihe'])
            ->add('kuvaus', TextType::class, ['label' => 'Kuvaus'])
            ->add('kirjauspvm', TextType::class, ['label' => 'Kirjauspäivämäärä'])
            ->add('etunimi', TextType::class, ['label' => 'Etunimi'])
            ->add('sukunimi', TextType::class, ['label' => 'Sukunimi'])
            ->add('email', TextType::class, ['label' => 'Email'])

            ->add('save', SubmitType::class, [
                'label' => 'Talleta',
                'attr' => ['class' => 'btn btn-info'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data-class' => Aloite::class,
        ]);

    }
}
