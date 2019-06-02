<?php

namespace App\Http\Controllers\backend;

use App\Brand;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class BrandController extends BackendController
{
    public function index()
    {
        $brandData = Brand::orderBy('id', 'DESC')->get();
        $this->data('brandData', $brandData);
        return view($this->pagePath . 'brands.show-brands', $this->data);
    }

    public function addBrand(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'brands.add-brand', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'brandname' => 'required|min:3|max:50'
            ]);
            $data['brandname'] = $request->brandname;
            $data['created_at'] = Carbon::now()->toDateString();
            $data['updated_at'] = Carbon::now()->toDateString();
        }

        if (Brand::create($data)) {
            return redirect()->route('brands')->with('success', 'Brand is added');
        }
    }
}
