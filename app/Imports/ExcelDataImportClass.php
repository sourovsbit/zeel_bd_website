<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Brands;

class ExcelDataImportClass implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        for ($i=0; $i < count($collection) ; $i++)
        {
            Brands::create([
                'brand_name' => $collection[$i][0],
                'brand_name_bn' => $collection[$i][1],
                'status' => 1,
                'create_by' => 1,
            ]);
        }

        return;
    }
}
