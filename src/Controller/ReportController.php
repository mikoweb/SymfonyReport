<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Controller;

use App\Form\ReportFilterType;
use App\Query\HistoryExport\ReportQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends AbstractController
{
    public function index(Request $request, ReportQuery $query): Response
    {
        $form = $this->createForm(ReportFilterType::class, null, [
            'method' => 'get',
            'action' => $this->generateUrl('app_report_index'),
        ]);

        $form->handleRequest($request);

        return $this->render('report/index.html.twig', [
            'items' => $query->getResult($form),
            'form' => $form->createView(),
        ]);
    }
}
