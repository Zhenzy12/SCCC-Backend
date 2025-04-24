<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

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
                // Use the Eloquent model to create the record
                $report = Report::create([
                    'time' => $row['time'],
                    'date_received' => $row['date_received'] ?? null,
                    'arrival_on_site' => $row['arrival_on_site'] ?? null,
                    'name' => $row['name'] ?? null,
                    'landmark' => $row['landmark'] ?? null,
                    'longitude' => isset($row['longitude']) && is_numeric($row['longitude']) ? $row['longitude'] : 0,
                    'latitude' => isset($row['latitude']) && is_numeric($row['latitude']) ? $row['latitude'] : 0,
                    'source_id' => $row['source_id'] ?? null,
                    'incident_id' => $row['incident_id'] ?? null,
                    'barangay_id' => $row['barangay_id'] ?? null,
                    'actions_id' => $row['actions_id'] ?? null,
                    'assistance_id' => $row['assistance_id'] ?? null,
                    'urgency_id' => $row['urgency_id'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            return response()->json([
                'message' => 'Data successfully imported into the database',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during import: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function uploadFileView(Request $request)
    {
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
