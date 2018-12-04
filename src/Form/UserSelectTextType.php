<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 04/12/2018
 * Time: 10:47
 */

namespace App\Form;


use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserSelectTextType extends AbstractType
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new EmailToUserTransformer($this->userRepository));
    }


    public function getParent()
    {
        return TextType::class;
    }

}