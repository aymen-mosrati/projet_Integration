<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        // ->add('image', VichImageType::class, [
        //     'label' => 'Image (JPG or PNG file)',
        //     'required' => false,
        //     'allow_delete' => true,
        //     'download_uri' => false,
        //     'imagine_pattern' => 'squared_thumbnail_small'

        // ])
            ->add('image')
            ->add('Date_img')
            ->add('Description_img')
            ->add('Mnt_img');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
