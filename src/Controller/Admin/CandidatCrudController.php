<?php

namespace App\Controller\Admin;

use App\Entity\Candidat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CandidatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user'),
            TextField::new('firstName'),
            TextField::new('lastName'),
            BooleanField::new('isDisponible'),
            DateField::new('createdAt'),
            DateField::new('uptdateAt'),
            DateField::new('deletedAt'),
            TextField::new('pays'),
            AssociationField::new('user'),
            AssociationField::new('cv'),
            AssociationField::new('passport'),
            AssociationField::new('genre'),
            TextField::new('adresse'),
            TextField::new('nationalite'),
            DateField::new('birthAt'),
            TextField::new('lieuNaissance'),
            AssociationField::new('experience'),
            AssociationField::new('metier'),
            TextField::new('content'),


        ];
    }
    
}
