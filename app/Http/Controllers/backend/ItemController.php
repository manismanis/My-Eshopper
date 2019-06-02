<?php

namespace App\Http\Controllers\backend;

use App\Brand;
use App\Category;
use App\Item;
use App\ItemAttribute;
use App\ProductAttribute;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ItemController extends BackendController
{
    public function index()
    {
        $itemData = Item::orderBy('id', 'DESC')->get();
        $this->data('itemData', $itemData);
        return view($this->pagePath . 'items.show-items', $this->data);
    }

    public function addItem(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('catData', Category::all());
            $this->data('subcatData', Subcategory::all());
            $this->data('brandData', Brand::all());
            $this->data('itemData', Item::all());
            return view($this->pagePath . '.items.add-item', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'itemname' => 'required|min:3|max:50|unique:items,itemname',
                'price' => 'required|min:3|max:20|',
                'upload' => 'required|mimes:jpg,jpeg,png,gif'
            ]);

            $data['itemname'] = $request->itemname;
            $data['price'] = $request->price;
            $data['subcat_id'] = $request->subcat_name;
            $data['brand_id'] = $request->brandname;
            $data['created_at'] = Carbon::now()->toDateString();
            $data['updated_at'] = Carbon::now()->toDateString();

            if (empty($_POST["isStatus"])) {
                $data['status'] = 0;
            } else {
                $data['status'] = 1;
            }
            if (empty($_POST["isFeatured"])) {
                $data['isFeatured'] = 0;
            } else {
                $data['isFeatured'] = 1;
            }
            if (empty($_POST["isRecommended"])) {
                $data['isRecommended'] = 0;
            } else {
                $data['isRecommended'] = 1;
            }


            //file upload...
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;   //imageko name override nahos vanera md5 gareko ani chadai name change garnalai microtime
                $uploadPath = public_path('uploads/images/items');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }

            if (Item::create($data)) {
                return redirect()->route('items')->with('success', 'Item is added');
            }

        }

    }

    public function addAttribute(Request $request, $id = null)
    {
        $itemDetails = Item::where(['id' => $id])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['sku'] as $key => $val) {
                if (!empty($val)) {
                    $attribute = new ItemAttribute();  //this method is defined in model called Item
                    $attribute->item_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    if ($attribute->save()) {
                        return redirect()->back()->with('success', 'Attributes have been added successfully');
                    }
                }
            }
        }

        return view($this->pagePath . 'items.item-attribute')->with(compact('itemDetails'));
    }


}
