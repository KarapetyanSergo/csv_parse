<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Builder;

class CsvFileRepository
{
  public function singleFiltering(Builder $query, string $key, string $value): void
  {
      $query->where($key, 'LIKE', '%'.$value.'%');
  }

  public function multipleKeyFiltering(Builder $query, array $keys, string $value): void
  {
    foreach ($keys as $i => $key) {
      if ($i === 0) {
        $query->where($key, 'LIKE', '%'.$value.'%');
        continue;
      }

      $query->orWhere($key, 'LIKE', '%'.$value.'%');
    }
  }
}