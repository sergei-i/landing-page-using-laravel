<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesAddController extends Controller
{
    public function execute(Request $request)
    {
        if (view()->exists('admin.pages_add')) {
            return view('admin.pages_add', ['title' => 'Новая страница']);
        }

        abort(404);
    }
}
