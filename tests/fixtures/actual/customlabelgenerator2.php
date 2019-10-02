<?php

use Libchart\Model\Point;
use Libchart\Model\XYDataSet;
use Libchart\View\Chart\HorizontalBarChart;
use Libchart\View\Label\LabelGenerator;
use Libchart\View\Primitive\Padding;

class ThousandLabelGenerator implements LabelGenerator
{
    function generateLabel($value)
    {
        return ((int)($value / 1000)) . "k";
    }
}

$chart = new HorizontalBarChart(500, 200);

$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("Jan 2005", 27300));
$dataSet->addPoint(new Point("Feb 2005", 32100));
$dataSet->addPoint(new Point("March 2005", 44200));
$dataSet->addPoint(new Point("April 2005", 71100));
$chart->setDataSet($dataSet);

$chart->setTitle("Monthly usage for www.example.com");
$chart->getPlot()->setLabelGenerator(new ThousandLabelGenerator());
$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 100));
$chart->render();
