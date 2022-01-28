<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Query\HistoryExport;

use App\Repository\HistoryExportRepository;
use Symfony\Component\Form\FormInterface;

class ReportQuery
{
    private HistoryExportRepository $repository;

    public function __construct(HistoryExportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getResult(FormInterface $form): array
    {
        $qb = $this->repository->createQueryBuilder('h')
            ->orderBy('h.createdAt', 'desc')
        ;

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->has('localName') && !empty($form->get('localName')->getData())) {
                $qb->andWhere('h.localName = :local_name')
                    ->setParameter('local_name', $form->get('localName')->getData())
                ;
            }

            if ($form->has('dateFrom') && !empty($form->get('dateFrom')->getData())) {
                $qb->andWhere('h.createdAt >= :date_from')
                    ->setParameter('date_from', $form->get('dateFrom')->getData())
                ;
            }

            if ($form->has('dateTo') && !empty($form->get('dateTo')->getData())) {
                $qb->andWhere('h.createdAt <= :date_to')
                    ->setParameter('date_to', $form->get('dateTo')->getData())
                ;
            }
        }

        return $qb->getQuery()->getResult();
    }
}
