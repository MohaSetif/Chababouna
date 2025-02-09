<?php

namespace App\Http\Controllers;

use App\Imports\BooksImport;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;

class Bookstore extends Controller
{
    public function list(Request $request)
    {
        $collections = Excel::toCollection(new BooksImport, storage_path('app/public/imports/books.xlsx'));

        $data = $collections->first()->skip(1)->map(function ($row, $index) {
            return [
                'id' => $index,
                'field' => $row[1],
                'title' => $row[2],
                'writer_name' => $row[3],
                'documentation' => $row[4],
                'review' => $row[5],
                'publication' => $row[6],
                'parts' => $row[7],
                'note' => $row[8],
                'copies' => $row[9] ?? 1,
                'photo' => null,
            ];
        });

        $page = $request->input('page', 1);
        $perPage = 10;
        $paginatedData = new LengthAwarePaginator(
            $data->forPage($page, $perPage),
            $data->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('library', ['books' => $paginatedData]);
    }
}
