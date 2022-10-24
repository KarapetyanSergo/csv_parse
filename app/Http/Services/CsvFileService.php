<?php

namespace App\Http\Services;

use App\Http\Repositories\CsvFileRepository;
use App\Models\Import;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

class CsvFileService
{
  public function importFile(UploadedFile $file): bool
  {
    $csv = file_get_contents($file);
    $csvFile = explode(PHP_EOL, $csv);

    $imporst = [];

    foreach ($csvFile as $i => $csvLine) {
      if ($i === 0) {
          continue;
      }

      $line = str_replace('"', ' ', str_replace(',', '', explode(';', $csvLine)));
      $imports[] = [
          'code' => $line[0],
          'name' => $line[1],
          'level1' => $line[2],
          'level2' => $line[3],
          'level3' => $line[4],
          'price' => $line[5],
          'priceSP' => $line[6],
          'quantity' => $line[7],
          'property_fields' => $line[8],
          'joint_purchases' => $line[9],
          'unit_of_measurement' => $line[10],
          'picture' => $line[11],
          'show_on_main' => $line[12],
          'description' => $line[13],
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ];
    }

    return Import::insert($imports);
  }

  public function csvDataListFiltering(Builder $query, string $search): void
  {
    $repo = new CsvFileRepository();

    $repo->multipleKeyFiltering($query, [
      'name',
      'code',
      'description'
    ], $search);
  }
}