<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", TextType::class, array("label" => "Nome:", "required" => false, "attr" => array(
                "placeholder" => "Nome",
                "autocomplete" => "off",
                "class" => "form-control"
            )))
            ->add("email", EmailType::class, array("label" => "E-mail:", "required" => false, "attr" => array(
                "placeholder" => "E-mail",
                "autocomplete" => "off",
                "class" => "form-control"
            )))
            ->add("age", TextType::class,  array("label" => "Idade:", "required" => false, "attr" => array(
                "placeholder" => "Idade",
                "autocomplete" => "off",
                "class" => "form-control",
            )))
            ->add("save", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-3",
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
