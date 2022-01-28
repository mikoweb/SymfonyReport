<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('report/index.html.twig');
    }
}
