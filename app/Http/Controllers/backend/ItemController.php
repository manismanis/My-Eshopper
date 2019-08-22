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
use Illuminate\Validation\Rule;

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

    public function deleteFile($id)  //userko related image delete garna ko lagi
    {
        $criteria = $id;
        $findData = Item::findOrFail($criteria);
        $filename = $findData->image;
        $deletePath = public_path('uploads/images/items/' . $filename);
        if (file_exists($deletePath) && is_file($deletePath)) {  //$delepath ma item file chha ra file ho bhane..delete garne
            return unlink($deletePath);
        }
        return true;  //image nahuda ni delete garna
    }


    public function deleteItem(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Item::findOrFail($criteria);
        if ($this->deleteFile($criteria) && ($findData->delete())) {

            return redirect()->route('items')->with('success', 'Item has been deleted');
        }
    }

    public function editItem(Request $request)
    {
        $this->data('catData', Category::all());
        $this->data('subcatData', Subcategory::all());
        $this->data('brandData', Brand::all());
        $criteria = $request->criteria;
        $findData = Item::findOrFail($criteria);
        $this->data('itemData', $findData);
        return view($this->pagePath . 'Items.edit-item', $this->data);

    }

    public function editItemAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'itemname' => 'required|min:3|max:50|',[
                    Rule::unique('items', 'itemname')->ignore($criteria)  //yo username ra email unique hunuparchha bhanne rule lai ignore garchha
                ],
                'price' => 'required|min:3|max:20|',
                'upload' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $data['itemname'] = $request->itemname;
            $data['price'] = $request->price;
            $data['subcat_id'] = $request->subcat_name[0];
            $data['brand_id'] = $request->brandname[0];

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
        }

        if (Item::where('id', '=', $criteria)->update($data)) {  //yo logic bujhne..
            return redirect()->route('items')->with('success', 'Item has been updated');

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
                    $attribute->color = $data['color'][$key];
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
