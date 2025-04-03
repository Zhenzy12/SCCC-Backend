<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Report;

class FileUploadController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        // Validate the request to ensure a file is uploaded
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048', // 2MB max file size and allowed file types
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Generate a unique filename to store the file
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Store the file on the server (in the storage/app/public folder)
        $filePath = $file->storeAs('uploads/excel', $fileName, 'public');

        // Optionally, you can store the file path in the database if needed

        // Return a success response with the file path
        return response()->json([
            'message' => 'File uploaded successfully',
            'file_path' => $filePath
        ]);
    }

    public function readAndUpload(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048', // 2MB max file size and allowed file types
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Load the uploaded file using PhpSpreadsheet
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Array to store inserted records
        $insertedRecords = [];

        // Process each row, assuming the first row contains column headers
        foreach ($data as $index => $row) {
            if ($index === 0) continue; // Skip header row
        
            // Check if 'time' is missing or null, then skip this row
            if (empty($row[0])) {
                continue;
            }
        
            // Insert the record
            $report = Report::create([
                'time' => $row[0],
                'date_received' => $row[1] ?? null,
                'arrival_on_site' => $row[2] ?? null,
                'name' => $row[3] ?? null,
                'landmark' => $row[4] ?? null,
                'longitude' => !empty($row[5]) ? $row[5] : 0,
                'latitude' => !empty($row[6]) ? $row[6] : 0,
                'source_id' => $row[7] ?? null,
                'incident_id' => $row[8] ?? null,
                'barangay_id' => $row[9] ?? null,
                'actions_id' => $row[10] ?? null,
                'assistance_id' => $row[11] ?? null,
                'urgency_id' => $row[12] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Store the inserted record
            $insertedRecords[] = $report;
        }

        // Free memory
        unset($spreadsheet, $sheet, $data);

        // Return a success response with inserted data
        return response()->json([
            'message' => 'Data successfully imported into the database',
            'inserted_records' => $insertedRecords,
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
