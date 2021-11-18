<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StatisticExport implements FromView
{
    public function view(): View
    {
        return view('exports.users', [
            'users' => Product::all()
        ]);
    }
}
