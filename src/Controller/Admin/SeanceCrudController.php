<?php

namespace App\Controller\Admin;

use App\Entity\Seance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class SeanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn (): string
    {
        return Seance::class;
    }


    public function configureFields (string $pageName): iterable
    {
        return [
            DateTimeField::new ('HeureDebut'),
            AssociationField::new ('films'),
        ];
    }

}
