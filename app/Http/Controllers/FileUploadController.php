<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
