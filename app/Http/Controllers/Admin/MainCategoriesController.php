<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoriesController extends Controller
{
    public function index()
    {
        $default_lang = get_default_lang();
        $categories = MainCategory::where('translation_lang', $default_lang)
            ->selection()
            ->get();

        return view('admin.maincategories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.maincategories.create');
    }

}
