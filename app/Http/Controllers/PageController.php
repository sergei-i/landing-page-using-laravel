<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function execute($alias)
    {
        if (!$alias) {
            abort(404);
        }

        if (view()->exists('site.page')) {

            $page = Page::where('alias', strip_tags($alias))->first();

            return view('site.page', compact('page'));
        }

        abort(404);
    }
}
