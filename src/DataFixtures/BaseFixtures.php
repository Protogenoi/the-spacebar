<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 05/09/2018
 * Time: 12:31
 */

namespace App\DataFixtures;


use function Clue\StreamFilter\fun;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

abstract class BaseFixtures extends Fixture
{

    /** @var ObjectManager */

    private $manager;

    /** @var Generator */

    protected $faker;

    abstract protected function loadData(ObjectManager $em);

    public function load(ObjectManager $manager)
    {

       $this->manager = $manager;
       $this->faker = Factory::create();

       $this->loadData($manager);

    }

    protected function createMany(string $className, int $count, callable $factory)
    {

        for ($i =0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);

            $this->manager->persist($entity);
            //store for useage later as App/Entity/ClassName_#COUNT#
        $this->addReference($className . '_' . $i, $entity);
    }

    }

}