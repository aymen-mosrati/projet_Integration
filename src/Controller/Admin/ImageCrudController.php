<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextEditorField::new('Description_img'),
            NumberField::new('Mnt_img'),
            AssociationField::new('user'),

            AssociationField::new('commentaire'),
            ImageField::new('image')
            ->setBasePath('images/user')
            ->setUploadDir('public/images/user')
            ->setUploadedFileNamePattern('[randomhash].[extention]') 
            ->setRequired(true),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
          return $filters
            ->add('Description_img')
            ->add('Mnt_img');
    }
}
