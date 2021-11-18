<?php

namespace App\Controller\Admin;

use App\Entity\Opslag;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpslagCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opslag::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('opbergerId', 'Opberger')->autocomplete(),
            AssociationField::new('productId', 'Product')->autocomplete(),
            IntegerField::new('aantal'),
            TextField::new('verpakking')
        ];
    }

}
