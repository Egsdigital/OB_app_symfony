<?php

namespace App\Controller\Admin;

use App\Entity\Structures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StructuresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Structures::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('adresse_structure'),
            TextField::new('user_email'),
        ];
    }

}
