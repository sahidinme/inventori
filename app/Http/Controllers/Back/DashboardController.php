<?php

namespace App\Http\Controllers\Back;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard.index', [
            'total_product'    => Product::count(),
            'total_categories'  => Categories::count()

        ]);
    }
}
