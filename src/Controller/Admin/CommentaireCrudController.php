<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CommentaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commentaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            DateField::new('Date_cmt'),
            TextEditorField::new('Description_cmt'),
            AssociationField::new('user'),
            ImageField::new('image')
            ->setUploadDir('public/images/user')
            ->setUploadedFileNamePattern('[randomhash].[extention]') 
            ->setRequired(true),
        ];
    }
    
    public function configureFilters(Filters $filters): Filters
    {
          return $filters
            ->add('Date_cmt')
            ->add('Description_cmt'); 
    }
}
