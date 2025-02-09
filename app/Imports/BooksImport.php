<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;

class BooksImport implements ToModel
{
    public function model(array $row)
    {
        return new Book([
            'copies' => $row[9] ?? null,
            'note' => $row[8] ?? null,
            'parts' => $row[7] ?? null,
            'publication' => $row[6] ?? null,
            'documentation' => $row[5] ?? null,
            'review' => $row[4] ?? null,
            'writer_name' => $row[3] ?? null,
            'title' => $row[2] ?? null,
            'field' => $row[1] ?? null,
            'id' => $row[0] ?? null
        ]);
    }
}