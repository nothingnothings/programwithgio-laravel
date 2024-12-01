<?php
declare(strict_types=1);

namespace App\Enums;


enum FileType: string
{
    case PDF = 'pdf';
    case XLSX = 'xlsx';
    case CSV = 'csv';
}
