<?php

namespace App\Imports;

use App\Models\Pemilih;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PemilihImport implements Importer
{
    protected static ?string $model = Pemilih::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama')->label(__('nama'))
                ->requiredMapping()
                ->example('Riyan Maulana')
                ->exampleHeader(__('nama'))
                ->rules(['required', 'max:255']),
            ImportColumn::make('jk')->label(__('jk'))
                ->example('L')
                ->exampleHeader(__('jk'))
                ->requiredMapping()
                ->rules(['required', 'max:1']),
            ImportColumn::make('nipd')->label(__('nipd'))
                ->example('1234')
                ->exampleHeader(__('nipd'))
                ->requiredMapping()
                ->rules(['required', 'max:4']),
            ImportColumn::make('nisn')->label(__('nisn'))
                ->example('0123456789')
                ->exampleHeader(__('nisn'))
                ->requiredMapping()
                ->rules(['required', 'max:10']),
            ImportColumn::make('tmpt_lahir')->label(__('tmpt_lahir'))
                ->example('Banjarmasin')
                ->exampleHeader(__('tmpt_lahir'))
                ->requiredMapping()
                ->rules(['required', 'max:100']),
            ImportColumn::make('tgl_lahir')->label(__('tgl_lahir'))
                ->example('2009-01-23')
                ->exampleHeader(__('tgl_lahir'))
                ->requiredMapping()
                ->rules('required'),
            ImportColumn::make('agama')->label(__('agama'))
                ->example('Islam')
                ->exampleHeader(__('agama'))
                ->requiredMapping()
                ->rules('required'),
            ImportColumn::make('rombel')->label(__('rombel'))
                ->example('7A')
                ->exampleHeader(__('rombel'))
                ->requiredMapping()
                ->rules(['required', 'max:2']),
            ImportColumn::make('passcode')->label(__('passcode'))
                ->example('20090123')
                ->exampleHeader(__('passcode'))
                ->requiredMapping()
                ->rules(['required', 'max:18']),
        ];
    }

    public function resolveRecord(): ?Pemilih
    {
        return Pemilih::firstOrNew([
            'nisn' => $this->data['nisn'],
        ]);

        return new Pemilih();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Sukses import data pemilih ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' di import.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' gagal di import.';
        }

        return $body;
    }
}
