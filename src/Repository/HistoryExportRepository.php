<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Repository;

use App\Entity\HistoryExport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoryExport|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoryExport|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoryExport[]    findAll()
 * @method HistoryExport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoryExportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoryExport::class);
    }
}
