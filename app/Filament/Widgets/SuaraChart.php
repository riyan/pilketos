<?php

namespace App\Filament\Widgets;

use App\Models\Paslon;
use App\Models\Suara;
use Filament\Widgets\ChartWidget;

class SuaraChart extends ChartWidget
{
    protected static ?string $heading = 'Hasil Pemungutan Suara';
    protected static ?string $description = 'Pemilihan Ketua & Wakil OSIS SMPN 23 BANJARMASIN';
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '270px';
    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
    ];

    protected function getData(): array
    {
        $datax = Paslon::selectRaw(
            "`slogan`,COALESCE(
                (SELECT COUNT(`paslon_id`) FROM `suaras` WHERE `paslons`.`id` = `suaras`.`paslon_id` GROUP BY `paslon_id`)
            ,0) AS `aggregate`"
            )->get();

        $datax->transform(function($items){
            return (object)['labels' => $items->slogan, 'data' => $items->aggregate];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah suara didapat',
                    'data' => $datax->map(function($val){ return $val->data; }),
                    'backgroundColor' => [
                        'rgba(0, 30, 253, 0.366)',
                        'rgba(253, 236, 0, 0.366)',
                        'rgba(0, 130, 11, 0.366)'
                    ],
                    'borderColor' => [
                        'rgb(0, 30, 253)',
                        'rgb(253, 236, 0)',
                        'rgb(0, 130, 11)'
                    ]
                ],
            ],
            'labels' => $datax->map(function($val){ return $val->labels; }),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
