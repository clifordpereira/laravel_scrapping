<?php

namespace App\Http\Controllers;

use App\Models\ScrapedData;
use Illuminate\Http\Request;

class ScrapedDataController extends Controller
{
    public function index()
    {
        $data = ScrapedData::paginate(5);
        return response()->json($data);
    }
}
