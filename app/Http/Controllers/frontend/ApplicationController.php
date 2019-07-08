<?php

namespace App\Http\Controllers\frontend;

use App\Brand;
use App\Cart;
use App\Category;
use App\Item;
use App\ItemAttribute;
use App\Slider;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ApplicationController extends FrontendController
{
    public function index()
    {
        //===frontend ko slider ma data lana ko lagi
        $sliderData = Slider::orderBy('id', 'asc')->get();

        $this->data('sliderData', $sliderData);

        $categoryData = Category::orderBy('id', 'asc')->get();
        $this->data('categoryData', $categoryData);


        $brandData = Brand::orderBy('id', 'asc')->get();
        $this->data('brandData', $brandData);

        $itemData = Item::orderBy('id', 'asc')->get();
        $this->data('itemData', $itemData);

        return view($this->pagePath . '.home.home', $this->data);  //slider and slidebar pages are included in home page itself
                                                                        //so no need to return data into those pages..
    }

    public function contact(){
//        $this->data('title', $this->setTitle('Contact'));
        $categoryData = Category::orderBy('id', 'asc')->get();
        $this->data('categoryData', $categoryData);

        $brandData = Brand::orderBy('id', 'asc')->get();
        $this->data('brandData', $brandData);

        $itemData = Item::orderBy('id', 'asc')->get();
        $this->data('itemData', $itemData);

        return view($this->pagePath . '.contact.contact', $this->data);
    }
    public function contactAction(Request $request){
        dd($request->all());
    }

    //to display only related items..when a subcategory is clicked..
    public function showItems($subcat_id)
    {
        $this->data('sliderData', Slider::all());
        $this->data('categoryData', Category::all());
        $this->data('brandData', Brand::all());
        $this->data('itemData', Item::all());

        $this->data('showItems', Item::where('subcat_id', $subcat_id)->get());
        $this->data('byCategory', Subcategory::select('subcat_name')->where('subcat_id', $subcat_id)->first());
        return view($this->pagePath . '.home.showitems', $this->data);

    }

    //
    public function itemDetail($id=null){
        $this->data('categoryData', Category::all());
        $this->data('brandData', Brand::all());
        $this->data('itemDetailData', Item::with('ItemAttribute')->where('id', $id)->first()); //ItemAttribute method have been declared in Item model.
        $this->data('total_stock', ItemAttribute::where('item_id', $id)->sum('stock'));
//        $this->data('itemDetailData', Item::where('id',$id)->first());
        return view('frontend/pages/home/item-detail', $this->data);
    }

//    public function addtoCart(Request $request)
//    {
//        $data = $request->all();
//        if (empty($data['email'])) {
//            $data['email'] = '';
//        }
//        $session_id=Session::get('session_id');
//        if (empty($session_id)){
//            $session_id=str_random(40);
//            Session::put('session_id',$session_id);
//        }
//
//        $this->validate($request, [
//            'size' => 'required',
//            'quantity' => 'required'
//        ]);
//
//        DB::table('carts')->insert([
//
//            'item_id'=>$data['item_id'],
//            'itemname'=>$data['itemname'],
//            'price'=>$data['price'],
//            'size'=>$data['size'],
//            'quantity'=>$data['quantity'],
//            'email'=>$data['email'],
//            'session_id'=>$session_id
//
//        ]);
//        return redirect()->back()->with('success', 'This item has been added to cart successfully');
//
//    }
//
//    public function viewCart(Request $request)  //cart ma click garda yo method aauchha..
//    {
//
//        $session_id=Session::get('session_id');
//        $userCart=DB::table('carts')->where(['session_id'=>$session_id])->get();
//
//        return view('frontend/pages/home/cart')->with(compact('userCart'));
//
//
//    }

    public function AddToCart(Request $request, $id){
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item, $item->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('index');
    }
    public function viewCart(){
        if (!Session::has('cart')){
            // --- Set Title & View
            $this->data('title', $this->setTitle('Home'));
            return view($this->pagePath . '.home.shopping-cart', $this->data);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $this->data('title', $this->setTitle('Home'));
        return view('frontend/pages/home/shopping-cart', $this->data, ['items' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


}