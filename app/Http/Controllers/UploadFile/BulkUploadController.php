<?php

namespace App\Http\Controllers\UploadFile;

use App\Http\Controllers\Controller;
use App\Models\ExcelData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BulkUploadController extends Controller
{
    /**
     * Construct function
     */
    public function __construct()
    {
        $this->file = 'file-upload.';
    }
    /**
     * View csv blade file`
     */
    public function index()
    {
        return view($this->file . 'csv');
    }

    /**
     * Up load csv file
     */
    public function upload(Request $request)
    {
        $data = ExcelData::all();
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:1000|mimes:csv,xls,xlsx',
        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }
        if ($request->hasfile('file')) {
            $fileName = $request->file->getClientOriginalName();
            $fileExt = $request->file->getClientOriginalExtension();
            $file = $request->file('file');
            $csvFile = file_get_contents($file);
            $rows = array_map('str_getcsv', explode("\n", $csvFile));

        }

        return redirect()->back();
    }

}
