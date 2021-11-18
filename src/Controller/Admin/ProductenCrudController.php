<?php

namespace App\Controller\Admin;

use App\Entity\Producten;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Producten::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('categorieId', 'Categorie')->autocomplete(),
            TextField::new('naam'),
            TextField::new('barcode'),
            IntegerField::new('inhoud'),
            TextField::new('meeteenheid')
        ];
    }

}
