<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Form;

use App\Query\HistoryExport\LocalNameFilterChoicesQuery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ReportFilterType extends AbstractType
{
    private LocalNameFilterChoicesQuery $localNameFilterChoicesQuery;

    public function __construct(LocalNameFilterChoicesQuery $localNameFilterChoicesQuery)
    {
        $this->localNameFilterChoicesQuery = $localNameFilterChoicesQuery;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('localName', ChoiceType::class, [
                'required' => false,
                'label' => 'forms.report_filter.local_name',
                'choices' => $this->localNameFilterChoicesQuery->getResult(),
            ])
            ->add('dateFrom', DateType::class, [
                'required' => false,
                'label' => 'forms.report_filter.date_from',
                'widget' => 'single_text',
            ])
            ->add('dateTo', DateType::class, [
                'required' => false,
                'label' => 'forms.report_filter.date_to',
                'widget' => 'single_text',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'forms.report_filter.submit',
            ])
        ;
    }
}
