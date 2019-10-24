<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsEmail;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $messages = [
            'required' => 'Поле ":attribute" обязательно к заполнению!',
            'email' => 'Поле ":attribute" должно соответвтвовать email адресу!'
        ];

        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], $messages);

            $data = $request->all();

            Mail::to($data['email'])->send(new ContactUsEmail($data));

            if ($request) {
                return redirect()->route('main')->with('status', 'Email отправлен!');
            }
        }

        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Service::all();
        $peoples = People::all();
        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        return view('site.index', compact('pages', 'portfolios', 'services', 'peoples', 'tags'));
    }
}
