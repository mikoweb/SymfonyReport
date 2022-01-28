<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\DataFixtures;

use App\Entity\HistoryExport;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

final class SampleHistoryExportsFixture extends AbstractFixture implements
    OrderedFixtureInterface,
    FixtureGroupInterface,
    ORMFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getGroups(): array
    {
        return ['sample_history_exports'];
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $this->createHistoryExport($manager);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder(): int
    {
        return 100;
    }

    private function createHistoryExport(ObjectManager $manager): HistoryExport
    {
        $faker = FakerFactory::create();
        $historyExport = new HistoryExport($faker->name(), $faker->userName(), $faker->streetName());
        $date = $faker->dateTime();
        $historyExport->setCreatedAt($date)->setUpdatedAt($date);
        $manager->persist($historyExport);

        return $historyExport;
    }
}
