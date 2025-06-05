<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre', 'Titre'),
            TextareaField::new('contenu', 'Contenu'),

            ImageField::new('imageName', 'Image')
                ->setBasePath('/uploads/images/actualites')
                ->onlyOnIndex(),

            Field::new('imageFile', 'Fichier image')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),

            DateTimeField::new('createdAt', 'Créé le')
                ->hideOnForm(),

            BooleanField::new('isPublished', 'Publié')
        ];
    }

}
