<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Query\HistoryExport;

use App\Repository\HistoryExportRepository;

class LocalNameFilterChoicesQuery
{
    private HistoryExportRepository $repository;

    public function __construct(HistoryExportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getResult(): array
    {
        $data = $this->repository->createQueryBuilder('h')
            ->select('DISTINCT h.localName')
            ->orderBy('h.localName')
            ->getQuery()
            ->getResult()
        ;

        $result = [];
        foreach ($data as $item) {
            $result[$item['localName']] = $item['localName'];
        }

        return $result;
    }
}
