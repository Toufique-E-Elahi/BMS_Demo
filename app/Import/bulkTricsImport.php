<?php


namespace App\Import;
use App\Models\tric;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class bulkTricsImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row->filter()->isNotEmpty()) {
                $addTric=new tric([
                    'chapterNumber' => $row[0],
                    'title' =>$row[1],
                    'b1h' => $row[2],
                    'b1' => $row[3],
                    'imageOne' => $row[4],
                    'imageTwo' => $row[5],

                ]);

                $addTric->save();

            }
    }
    }
}
