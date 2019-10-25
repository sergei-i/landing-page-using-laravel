<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('POST')) {

            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле ":attribute" обязательно для заполнения',
                'unique' => 'Поле ":attribute" должно быть уникальным',
                'image' => 'Файл должен быть картинкой'
            ];

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text' => 'required',
                'images' => 'nullable|image'
            ], $messages);

            if ($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path() . '/assets/img', $input['images']);
            }

            $page = new Page();
            $page->fill($input);

            if ($page->save()) {
                return redirect('admin')->with('status', 'Страница добавлена');
            }
        }

        if (view()->exists('admin.pages_add')) {
            return view('admin.pages_add', ['title' => 'Новая страница']);
        }

        abort(404);
    }
}
