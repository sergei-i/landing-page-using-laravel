<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute($id)
    {
        //Page::find($id)->delete();
        echo 'delete';
    }
}
