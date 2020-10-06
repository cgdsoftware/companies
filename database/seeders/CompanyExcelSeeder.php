<?php

namespace LaravelEnso\Companies\Database\Seeders;

use LaravelEnso\DataImport\Services\ExcelSeeder;

class CompanyExcelSeeder extends ExcelSeeder
{
    protected string $type = 'companies';
    protected string $filename = 'companies.xlsx';
}
