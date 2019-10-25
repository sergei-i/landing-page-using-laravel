<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        //Page::find($id)->delete();
        if ($request->isMethod('POST')) {

            $input = $request->except('__token');

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,' . $input['id'],
                'text' => 'required',
                'images' => 'nullable|image'
            ]);

            if ($validator->fails()) {
                return redirect()->route('pagesEdit', ['page' => $input['id']])->withErrors($validator)->withInput();
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file->move(public_path() . '/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $page->fill($input);

            if ($page->save()) {
                return redirect('admin')->with('status', 'Страница обновлена');
            }
        }

        if ($request->isMethod('DELETE')) {
            $page->delete();

            return redirect('admin')->with('status', 'Страница удалена');
        }

        $oldPage = $page->toArray();
        if (view()->exists('admin.pages_edit')) {
            return view('admin.pages_edit', [
                'title' => 'Редактирование страницы - ' . $oldPage['name'],
                'data' => $oldPage
            ]);
        }
        abort(404);
    }
}
