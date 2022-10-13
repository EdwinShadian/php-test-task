<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Tender;
use Illuminate\Console\Command;
use ParseCsv\Csv;

class ParseCsv extends Command
{
    protected $signature = 'tender:parse-csv {filepath}';

    protected $description = 'Parse given .csv file and save data to database';

    public function handle()
    {
        try {
            $csv = new Csv($this->argument('filepath'));
        } catch (\Throwable $e) {
            $this->error($e->getMessage());

            return;
        }

        $this->info('Parsing has started!');

        foreach ($csv->data as $row) {
            $tender = Tender::make();
            foreach ($row as $key => $value) {
                match ($key) {
                    'Внешний код' => $tender->external_code = $value,
                    'Номер' => $tender->number = $value,
                    'Статус' => $tender->status = $value,
                    'Название' => $tender->name = $value,
                    'Дата изм.' => $tender->update_date = $value,
                };
            }

            $tender->save();
        }

        $this->info('Successfully parsed!');
    }
}
