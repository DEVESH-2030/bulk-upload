<?php

namespace App\Http\Controllers;

use App\Models\ExcelData;
use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ValidationRequest;

class ImportExcelController extends Controller
{
    /**
     * Construct
     */
    public function __construct()
    {
        $this->url = 'file-upload.';
    }
    /**
     * View import Excel file
     */
    public function view()
    { 
        // $data = ExcelData::orderBy('id', 'DESC')->get();
        $data = ExcelData::paginate(5);
        return view($this->url . 'import_excel', compact('data'));
    }

    /**
     * Upload/ Import Excel file
     */
    public function import(ValidationRequest $request)
    {
        $this->validate($request, [
            'file' => 'required|max:2048|mimes:xls,xlsx,csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
        $excel_data = \Excel::import(new ExcelImport, $request->file('file'));

        return back()->with('success', 'Excel file uploaded successfully.');
    } 

    /**
     * Delete Record which uploaded excel file
     */
    public function delete($id)
    {
        ExcelData::where('id',$id)->delete();
        return back()->with('success', 'Deleted record');
    }

    /**
     * Download data which stored in database into Excel file
     * @return \Illuminate\Support\Collection
     */
    public function download() 
    {
        $export =  \Excel::download(new ExcelExport, 'bulk_upload.xls');
        $data = $export;
        $data->setContentDisposition('attachment','TimeSheetExport')->getFile()->move(storage_path('excel-file/'), $data->getFile());
        return back()->with('success', 'Records has been downloaded ');
    } 

}
