<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\CsvFileService;
use App\Models\Import;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImportedDataController extends Controller
{
    public function getList(Request $request, CsvFileService $csvFileService): JsonResponse
    {
        $query = Import::query();

        if ($request->search) {
            $csvFileService->csvDataListFiltering($query, $request->search);
        }
        
        return response()->json($query->simplePaginate($request->page_size));
    }
}
