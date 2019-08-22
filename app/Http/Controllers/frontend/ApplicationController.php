<?php

namespace App\Http\Controllers\frontend;

use App\Brand;
use App\Cart;
use App\Category;
use App\Item;
use App\ItemAttribute;
use App\Slider;
use App\Subcategory;
use App\User;
use App\UserAddress;
use App\UserAddresses;
use App\UserPaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

        $itemData = Item::orderBy('id', 'asc')->paginate(6);
        $this->data('itemData', $itemData);

        return view($this->pagePath . '.home.home', $this->data);  //slider and slidebar pages are included in home page itself
        //so no need to return data into those pages..
    }

    public function contact()
    {
//        $this->data('title', $this->setTitle('Contact'));
        $categoryData = Category::orderBy('id', 'asc')->get();
        $this->data('categoryData', $categoryData);

        $brandData = Brand::orderBy('id', 'asc')->get();
        $this->data('brandData', $brandData);

        $itemData = Item::orderBy('id', 'asc')->get();
        $this->data('itemData', $itemData);

        return view($this->pagePath . '.contact.contact', $this->data);
    }

    public function contactAction(Request $request)
    {
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
    //showitems bata view details ma click garepaxi yaha aauchha
    //to display and select diff details of an item
    public function itemDetail($id = null)
    {
        $this->data('categoryData', Category::all());
        $this->data('brandData', Brand::all());
        //this is related with Item and with it's child ItemAttribute
        //from here we can fetch data of child table using parent table
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

    public function AddToCart(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item, $item->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('index');
    }

    //to view the item
    public function ShoppingCart()
    {
        if (!Session::has('cart')) {
            // --- Set Title & View
            $this->data('title', $this->setTitle('Home'));
            return view($this->pagePath . '.home.shopping-cart', $this->data);
        }

        if (Auth::guard('web')->check()) {
            $id = Auth::user()->id;
            $this->data('viewData_UserAddresses', UserAddress::GetUserAddressList($id));
            $this->data('viewData_UserPaymentOptions', UserPaymentMethod::GetUserPaymentOptionsList($id));
            $this->data('viewData_UserPreferredPaymentOption', UserPaymentMethod::GetUserPreferredPaymentOption($id));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $this->data('title', $this->setTitle('Home'));
        return view($this->pagePath . '.home.shopping-cart', $this->data, ['items' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    //--- Users's Home ---
    public function ManageAccount()
    {
        // --- Set Title & View
        $this->data('title', $this->setTitle('Manage Account'));
        //$this->data('pages', 'items/show-item.view.php');
        return view($this->pagePath . '.users.user-manage-account', $this->data);
    }

    public function deleteFile($key)
    {
        $keyData = User::all()->where('id', '=', $key)->first();
        if ($keyData) {
            $fileName = $keyData->image;
            $filePath = public_path('uploads/images/users/' . $fileName);
            if (file_exists($filePath) && is_file($filePath)) {
                //--- remove file
                unlink($filePath);
                return true;
            }
        }
        return true;
    }

    public function userProfile(Request $request)
    {
        $id = Auth::user()->id;

        if ($request->isMethod('get')) {
            $this->data('viewData', User::all()->where('id', $id)->first());

            // --- Set Title & View
            $this->data('title', $this->setTitle('Edit Users Profile'));
            return view($this->pagePath . '.users.user-edit-profile', $this->data);
        }
        if ($request->isMethod('post')) {
            $keyData = User::all()->where('id', $id)->first();

            //--- Validate Rules
            $rules = [
                'name' => 'required|min:5|max:35',
                'phone' => 'required|min:3|max:25',
                'upload' => 'required|mimes:jpg,jpeg,gif,png'
            ];

            //--- Remove key(upload) from array if, no image selected for update
            if ($request->file('upload') == null) {
                unset($rules['upload']);
            }

            //--- Apply Rules
            $this->validate($request, $rules);

            //--- Init
            $keyData->name = $request->name;
            $keyData->dob = date_format(date_create($request->year[0] . "-" . $request->month[0] . "-" . $request->day[0]), "Y-m-d H:i:s");
            $keyData->gender = $request->gender[0];
            $keyData->phone_no = $request->phone;
            $keyData->email = $request->email;
            //---
            if ($request->hasFile('upload')) {
                $ext = $request->file('upload')->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                //--- Delete old image
                if ($this->deleteFile($id)) {
                    $keyData->image = $imageName;
                }
                //--- Upload new
                if ($request->file('upload')->move(public_path('uploads/images/users'), $imageName)) {
                    $data['image'] = $imageName;
                }
            }

            //--- Post
            if ($keyData->update()) {
                return redirect()->route('manage-account')->with('success', 'User Info has been successfully Updated');
            }
        }
    }

    public function userAddress(Request $request)
    {
        $id = Auth::user()->id;
        //dd(UserAddresses::GetUserAddressList($id));

        if ($request->isMethod('get')) {
            $this->data('viewData', UserAddress::GetUserAddressList($id));

            // --- Set Title & View
            $this->data('title', $this->setTitle('Users Address'));
            return view($this->pagePath . '.users.user-address', $this->data);
        }
        if ($request->isMethod('post')) {
            //--- Validate Rules
            $rules = [
                'name' => 'required|min:5|max:35',
                'phone' => 'required|min:3|max:25',
                'add4' => 'required|min:3|max:100',
            ];

            //--- Apply Rules
            $this->validate($request, $rules);

            //--- Init
            $data['user_id'] = $id;
            $data['name'] = $request->name;
            $data['phone_no'] = $request->phone;
            $data['add1'] = $request->add1[0];
            $data['add2'] = $request->add2[0];
            $data['add3'] = $request->add3;
            $data['add4'] = $request->add4;
            $data['isPreferred'] = $request->post('isPreferred') == null ? 0 : 1;

            // Update other Options as IsPreferred to False (If, current IsPreferred=true)
            if ($request->post('isPreferred') != null) {
                $_Addresses = UserAddress::GetUserAddressList($id);
                foreach ($_Addresses as $key => $value) {
                    $value->isPreferred = 0;
                    $value->save();
                }
            }
            //dd($data);

            //--- Post
            if (UserAddress::create($data)) {
                return redirect()->route('user-address')->with('success', 'User Address has been successfully added');
            }
        }
    }

    public function deleteUserAddress(Request $request)
    {
        $key = $request->id;
        $keyData = UserAddress::all()->where('id', '=', $key)->first();

        if ($keyData) {
            //--- remove from db
            if ($keyData->delete($key)) {
                return redirect()->route('user-address')->with('success', 'User Address has been successfully deleted');
            }
        } else {
            return redirect()->route('user-address')->with('error', 'Invalid ID');
        }
    }

    public function userPaymentOptions(Request $request)
    {
        $id = Auth::user()->id;

        if ($request->isMethod('get')) {
            $this->data('viewData', UserPaymentMethod::GetUserPaymentOptionsList($id));

            // --- Set Title & View
            $this->data('title', $this->setTitle('Users Payment Options'));
            return view($this->pagePath . '.users.user-payment-options', $this->data);
        }
        if ($request->isMethod('post')) {
            //--- Validate Rules
            $rules = [
                'paymentMethods' => 'required',
            ];

            //--- Apply Rules
            $this->validate($request, $rules);

            //--- Init
            $data['user_id'] = $id;
            $data['payment_method_id'] = $request->paymentMethods[0];
            $data['payment_method_title'] = $request->name;
            $data['payment_method_no'] = $request->no;
            $data['payment_method_details'] = $request->details;
            $data['isPreferred'] = $request->post('isPreferred') == null ? 0 : 1;

            // Update other Options as IsPreferred to False (If, current IsPreferred=true)
            if ($request->post('isPreferred') != null) {
                $_PaymentOptions = UserPaymentMethod::GetUserPaymentOptionsList($id);
                foreach ($_PaymentOptions as $key => $value) {
                    $value->isPreferred = 0;
                    $value->save();
                }
            }

            //--- Post
            if (UserPaymentMethod::create($data)) {
                return redirect()->route('user-payment-options')->with('success', 'User Payment Options has been successfully added');
            }
        }

    }

    public function checkout(Request $request)
    {
        if (!Session::has('cart')) {
            // --- Set Title & View
            $this->data('title', $this->setTitle('Home'));
            return view($this->pagePath . 'home.shopping-cart', $this->data);
        }
        // Run prerequisites
        $id = Auth::user()->id;

        //-- CHECK USER INFO STATUS - redirect to intended if unfullfilled
        //--   Check Profile
        $userName = User::GetUserDetails($id)->name;
        $userPhone = User::GetUserDetails($id)->phone_no;
        if (empty($userName) || empty($userPhone)) {
            return redirect()->route('user-profile')->with('error', 'Update User Info first for further');
        }
        $this->data('viewData_UserProfile', User::GetUserDetails($id));
        //--   Check Address
        if (count(UserAddress::GetUserAddressList($id)) == 0) {
            return redirect()->route('user-address')->with('error', 'Add User Address first for further');
        }
        $UserAddressId = $request->addId;
        if ($UserAddressId == null) {
            $UserAddress = UserAddress::GetUserPreferredAddress($id);
        } else {
            $UserAddress = UserAddress::GetUserAddressById($UserAddressId);
        }
        $this->data('viewData_UserAddress', $UserAddress);
        //--   Check Payment Options
        if (count(UserPaymentMethod::GetUserPaymentOptionsList($id)) == 0) {
            return redirect()->route('user-payment-options')->with('error', 'Add User Payment Options first for further');
        }
        $UserPaymentOptionId = $request->UserPaymentMethod[0];
        if ($UserPaymentOptionId == null) {
            $UserPaymentOption = UserPaymentMethod::GetUserPreferredPaymentOption($id);
        } else {
            $UserPaymentOption = UserPaymentMethod::GetUserPaymentOptionById($UserPaymentOptionId);
        }
        //-- Find Payment Method, If not Cash in Delivery then, redirect to related Veryfy Page
        if ($UserPaymentOption->payment_method_id != 1) {
            //-- Load to Related Verify Page
            //echo "eSewa Verify Page UNDER CONSTRUCTION <br>:-(";
            return redirect()->route('payment-options-esewa');
        }
        $this->data('viewData_UserPreferredPaymentOption', $UserPaymentOption);
        //-- PROCEED TO CHECKOUT --
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $this->data('title', $this->setTitle('Proceed to Checkout'));
        return view($this->pagePath . '.home.checkout', $this->data, ['items' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function PaymentOptionseSewa(Request $request)
    {
        //dd($request);
        $this->data('title', $this->setTitle('Verify eSewa'));
        return view($this->pagePath . '.home.payment-options-esewa', $this->data);
    }


}
