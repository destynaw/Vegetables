<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegetables; // Import the Vegetables model

class VegetableController extends Controller
{
    public function index(){
        $vegetables = Vegetables::all(); // Fetch all vegetables from the database
        return view('vegetables.index', compact('vegetables')); // Pass the data to the view
    }
}