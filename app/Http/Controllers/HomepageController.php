<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    //fungsi untuk menampilkan halaman homepage
    // public function index()
    // {
    //     $title=('homepage');
    //     return view('web.homepage', ['title'=>$title]);
    // }

    public function index()
 {
    $categories = Categories::all();
 return view('web.homepage',[
 'categories' => $categories,
 ]);
 }

    public function products()
    {
        $title=('products');
        return view('web.products', ['title'=>$title]);
    }

    
}
