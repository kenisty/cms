<?php

namespace App\Controller\Admin;

use App\Entity\ApiUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ApiUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ApiUser::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('firstname', 'Firstname'),
            TextField::new('lastname', 'Lastname'),
            TextField::new('email', 'Email')->hideOnIndex(),
        ];
    }
}
