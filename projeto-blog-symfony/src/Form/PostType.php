<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("title", TextType::class, array("label" => "Titulo:", "required" => false, "attr" => array(
                "autocomplete" => "off",
                "class" => "form-control"
            )))
            ->add("description", TextareaType::class, array("label" => "Descrição:", "required" => false, "attr" => array(
                "autocomplete" => "off",
                "class" => "form-control",
                "style" => "resize:none"
            )))
            ->add("save", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary",
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "data_class" => Post::class,
        ]);
    }
}
