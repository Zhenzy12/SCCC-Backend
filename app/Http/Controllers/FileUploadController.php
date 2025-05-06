<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use App\Models\Source;
use App\Models\Incident;
use App\Models\Barangay;
use App\Models\ActionsTaken;
use App\Models\TypeOfAssistance;
use App\Models\Urgency;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FileUploadController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        // 
    }

    private function validateAndConvertFields(array $row): array|false
    {
        $requiredFields = [
            'source_id', 'incident_id', 'barangay_id',
            'actions_id', 'assistance_id', 'urgency_id'
        ];

        $validatedRow = $row;

        foreach ($requiredFields as $field) {
            if (isset($row[$field])) {
                $value = trim($row[$field]);
                
                // If the value is numeric, keep it as is
                if (is_numeric($value)) {
                    $validatedRow[$field] = (int)$value;
                    continue;
                }

                // Map field names to model classes and their corresponding name fields
                $modelMap = [
                    'source_id' => ['class' => Source::class, 'field' => 'sources'],
                    'incident_id' => ['class' => Incident::class, 'field' => 'name'],
                    'barangay_id' => ['class' => Barangay::class, 'field' => 'name'],
                    'actions_id' => ['class' => ActionsTaken::class, 'field' => 'name'],
                    'assistance_id' => ['class' => TypeOfAssistance::class, 'field' => 'name'],
                    'urgency_id' => ['class' => Urgency::class, 'field' => 'name']
                ];

                $modelConfig = $modelMap[$field] ?? null;

                if (!$modelConfig) {
                    return false; // Invalid field name
                }

                try {
                    $model = new $modelConfig['class'];
                    // Convert both input value and model field to lowercase for case-insensitive comparison
                    $record = $model->whereRaw("LOWER({$modelConfig['field']}) = ?", [strtolower($value)])->first();
                    
                    if ($record) {
                        $validatedRow[$field] = $record->id;
                    } else {
                        return false; // Invalid value that doesn't match any record
                    }
                } catch (Exception $e) {
                    return false; // Model class doesn't exist or other error
                }
            }
        }

        return $validatedRow;
    }

    public function readAndUpload(Request $request)
    {
        try {
            // Validate the request to ensure 'data' is present and is an array
            $request->validate([
                'data' => 'required|array',
            ]);
    
            $insertedRecords = [];
    
            // Iterate over the data and insert each record using the model
            foreach ($request->input('data') as $row) {
                $validatedRow = $this->validateAndConvertFields($row);
                if (!$validatedRow) {
                    continue;
                }
                // Use the Eloquent model to create the record
                $report = Report::create([
                    'time' => $validatedRow['time'] ?? null,
                    'date_received' => $validatedRow['date_received'] ?? null,
                    'arrival_on_site' => $validatedRow['arrival_on_site'] ?? null,
                    'name' => $validatedRow['name'] ?? null,
                    'landmark' => $validatedRow['landmark'] ?? null,
                    'longitude' => isset($validatedRow['longitude']) && is_numeric($validatedRow['longitude']) ? $validatedRow['longitude'] : 0,
                    'latitude' => isset($validatedRow['latitude']) && is_numeric($validatedRow['latitude']) ? $validatedRow['latitude'] : 0,
                    'source_id' => $validatedRow['source_id'] ?? null,
                    'incident_id' => $validatedRow['incident_id'] ?? null,
                    'barangay_id' => $validatedRow['barangay_id'] ?? null,
                    'actions_id' => $validatedRow['actions_id'] ?? null,
                    'assistance_id' => $validatedRow['assistance_id'] ?? null,
                    'urgency_id' => $validatedRow['urgency_id'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Tracking::create([
                'category' => 'Report',
                'user_id' => Auth::id(),
                'action' => 'Imported',
                'data' => json_encode($request->input('data')),
                'description' => 'An Excel File was imported by ' . Auth::user()->firstName . ' ' . Auth::user()->lastName . '.',
            ]);
    
            return response()->json([
                'message' => 'Data successfully imported into the database',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred during import: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function uploadFileView(Request $request)
    {
        try{
            // Validate the uploaded file
            $request->validate([
                'file' => 'required|mimes:xlsx,xls|max:2048', // 2MB max file size and allowed file types
            ]);

            // Get the uploaded file
            $file = $request->file('file');

            // Load the uploaded file using PhpSpreadsheet
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            // Extract headers (first row)
            $headers = $data[0]; 
            $rows = array_slice($data, 1); // Get data rows

            // Filter out empty rows (if all values are null or empty)
            $filteredRows = array_filter($rows, function ($row) {
                return array_filter($row); // Remove rows where all values are empty
            });

            // Format the data into an array of associative arrays
            $formattedData = [];
            foreach ($filteredRows as $row) {
                $formattedData[] = array_combine($headers, $row);
            }

            // Return JSON response (data is not stored in the database)
            return response()->json([
                'message' => 'Data successfully fetched from the file',
                'data' => $formattedData,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred during import: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
