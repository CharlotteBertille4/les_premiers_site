<?php

namespace App\Controller\Admin;

use App\Entity\ImageGallery;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageGalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImageGallery::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),

            ImageField::new('image')
                ->setBasePath('/uploads/images/galleries')
                ->onlyOnIndex(),

            Field::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
        ];
    }

}
