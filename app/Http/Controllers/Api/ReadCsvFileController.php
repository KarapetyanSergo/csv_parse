<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadCsvRequest;
use App\Http\Services\CsvFileService;
use Illuminate\Http\JsonResponse;

class ReadCsvFileController extends Controller
{
    public function readCsvFile(UploadCsvRequest $uploadCsvRequest, CsvFileService $csvFileService): JsonResponse
    {
        $file = $uploadCsvRequest->file('csv_file');
        $import = $csvFileService->importFile($file);

        if (!$import) {
            return response()->json($this->errorResponse('Import failed'), 400);
        }

        return response()->json($this->successResponse('File imported'), 200);
    }
}
