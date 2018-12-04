<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 04/12/2018
 * Time: 10:47
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserSelectTextType extends AbstractType
{
    public function getParent()
    {
        return TextType::class;
    }

}