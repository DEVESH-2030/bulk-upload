<?php

namespace App\Imports;

use App\Models\ExcelData;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExcelImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;
    
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {   
        return new ExcelData([
            'name'  => $row['name'],
            'email' => $row['email']
        ]);
    }

    /**
     * Create rule/ validation for upload excel file 
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|unique:bulk_upload,name',
            'email' => 'required|unique:bulk_upload,email'
        ];
    }
}
