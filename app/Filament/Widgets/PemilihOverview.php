<?php

namespace App\Filament\Widgets;

use App\Models\Paslon;
use App\Models\Pemilih;
use App\Models\Suara;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PemilihOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pemilih', Pemilih::query()->count())
                ->color('info')
                ->description('Jumlah peserta didik aktif'),
            Stat::make('Suara', Suara::query()->count())
                ->color('success')
                ->description('Jumlah suara digunakan'),
            Stat::make('Paslon', Paslon::query()->count())
                ->color('warning')
                ->description('Jumlah kandidat'),
        ];
    }
}
