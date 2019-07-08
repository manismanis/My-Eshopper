<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends BackendController
{
    public function index()
    {
        $subcatData = Subcategory::orderBy('subcat_id', 'DESC')->get();
        $this->data('subcatData', $subcatData);
        return view($this->pagePath . 'subcategory.show-subcat', $this->data);

    }

    public function addSubCategory(Request $request)
    {

        if ($request->isMethod('get')) {
            $this->data('catData', Category::all());
            $this->data('subcatData', Subcategory::all());
            return view($this->pagePath . '.subcategory.add-subcat', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'subcat_name' => 'required|min:3|max:50'
            ]);

            $data['subcat_name'] = $request->subcat_name;
            $data['cat_id'] = $request->cat_name;

            if (Subcategory::create($data)) {
                return redirect()->route('subcategory')->with('success', 'Sub-Category is created');
            }

        }
    }

    public function deleteSubcategory(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Subcategory::findOrFail($criteria);
        if (($findData->delete())) {

            return redirect()->route('subcategory')->with('success', 'Subcategory has been deleted');
        }
    }

    public function editSubcategory(Request $request)
    {
        $this->data('categoryData', Category::all());
        $criteria = $request->criteria;
        $findData = Subcategory::findOrFail($criteria);
        $this->data('subcategoryData', $findData);
        return view($this->pagePath . 'subcategory.edit-subcat', $this->data);


    }

    public function editSubcategoryAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;

            $data['subcat_name'] = $request->subcat_name;
            $data['cat_id'] = $request->cat_name[0];


            if (Subcategory::where('subcat_id', '=', $criteria)->update($data)) {  //yo logic bujhne..
                return redirect()->route('subcategory')->with('success', 'Subcategory has been updated');


            }
        }

    }


}
