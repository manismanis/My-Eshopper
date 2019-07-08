<?php

namespace App\Http\Controllers\backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CategoryController extends BackendController
{
    public function index()
    {
        $catData = Category::orderBy('id', 'DESC')->get();
        $this->data('catData', $catData);
        return view($this->pagePath . 'category.show-cat', $this->data);
    }

    public function addCategory(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'category.add-cat', $this->data);
        }

        if ($request->isMethod('post')) {  //form submit garna lagda..
            $this->validate($request, [
                'cat_name' => 'required|min:3|max:50'
            ]);

            $data['cat_name'] = $request->cat_name;
            $data['created_at'] = Carbon::now()->toDateString();
            $data['updated_at'] = Carbon::now()->toDateString();
        }

        if (Category::create($data)) {
            return redirect()->route('category')->with('success', 'Category is created');
        }
    }

    public function deleteCategory(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Category::findOrFail($criteria);
        if (($findData->delete())) {

            return redirect()->route('category')->with('success', 'Category has been deleted');
        }
    }

    public function editCategory(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Category::findOrFail($criteria);
        $this->data('categoryData', $findData);
        return view($this->pagePath . 'category.edit-cat', $this->data);

    }

    public function editCategoryAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'cat_name' => 'required|min:3|max:50'
            ]);

            $data['cat_name'] = $request->cat_name;

            if (Category::where('id', '=', $criteria)->update($data)) {
                return redirect()->route('category')->with('success', 'Category has been updated');


            }

        }
    }

}
