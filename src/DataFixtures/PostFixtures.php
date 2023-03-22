<?php

namespace App\DataFixtures;

// use App\Entity\Users;
use App\Entity\Posts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PostFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_Fr');

        for ($i = 0; $i < 20; $i++) {
            $post = new Posts();
            $post->setTitle($faker->words(4, true))
                ->setDescription($faker->realText(1800))
                ->setState(mt_rand(0, 2) === 1 ? Posts::STATES[0] : Posts::STATES[1])
                ->setCreatedOn(new \DateTimeImmutable())
                ->setUpdatedOn(new \DateTimeImmutable());

            $manager->persist($post);

        }

        $manager->flush();
    }

}
