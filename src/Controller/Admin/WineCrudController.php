<?php

namespace App\Controller\Admin;

use App\Entity\Wine;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\LocaleField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wine::class;
    }
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addColumn(8);
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title');
        yield SlugField::new('slug')->setTargetFieldName('title');
        yield MoneyField::new('price')->setCurrency('EUR');
        yield ImageField::new('thumbnail')->setUploadDir('/public/images/wines/')->setBasePath('images/wines/')->setUploadedFileNamePattern('[year]/[month]/[day]/[slug]-[contenthash].[extension]');;
        yield ChoiceField::new('status');
        yield TextEditorField::new('plot');
        yield TextField::new('isbn');
        yield CountryField::new('country');
        yield TextField::new('region');
        yield FormField::addColumn(4);
        yield AssociationField::new('category');
        yield AssociationField::new('supplier');
        yield AssociationField::new('boxes');
        yield AssociationField::new('grapeVariety');
        yield AssociationField::new('tags');

        $createdAt = DateTimeField::new('createdAt');
        $updatedAt = DateTimeField::new('updatedAt');

        if (Crud::PAGE_EDIT === $pageName || Crud::PAGE_INDEX === $pageName) {
            yield $createdAt->setFormTypeOption('disabled', true);
            yield $updatedAt->setFormTypeOption('disabled', true);
        }
    }
}
