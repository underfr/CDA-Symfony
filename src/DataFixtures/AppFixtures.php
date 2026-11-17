<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Category;
use App\Entity\UserEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $users = [];
        for ($i = 0; $i < 10; $i++) {
            $user = new UserEntity();
            $user->setEmail($faker->unique()->safeEmail());
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setPassword(password_hash('password', PASSWORD_DEFAULT));
            $manager->persist($user);
            $users[] = $user;
        }

        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($faker->unique()->word());
            $manager->persist($category);
            $categories[] = $category;
        }

        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->setTitle($faker->sentence());
            $book->setAuthor($faker->name());
            $book->setPublishAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $book->setResume($faker->text());
            $book->setUser($faker->randomElement($users));
            $book->addCategory($faker->randomElement($categories));
            $manager->persist($book);
        }

        $manager->flush();
    }
}
