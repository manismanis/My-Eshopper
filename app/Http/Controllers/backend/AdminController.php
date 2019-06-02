<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AdminController extends BackendController
{

    public function index()
    {
        $adminData = Admin::orderBy('id', 'DESC')->get();  //Admin bhanne model ma chha table ko contents haru
        $this->data('adminData', $adminData);              //data bhanne function define gareko chha General bhanne trait ma
        return view($this->pagePath . 'admins.show-admins', $this->data);
    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {   //url bata direct aauna khojda ani Add Admin ma click garda yaha aauchha
            return view($this->pagePath . 'admins.add-admin', $this->data);
        }
        if ($request->isMethod('post')) {  //form submit garna lagda..
            $this->validate($request, [
                'fullname' => 'required|min:3|max:50',
                'username' => 'required|min:3|max:20|unique:admins,username', //admins bhanne table ko
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:3|max:20|confirmed',
                'upload' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $data['fullname'] = $request->fullname;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);

            //file upload...
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;   //imageko name override nahos vanera md5 gareko ani chadai name change garnalai microtime
                $uploadPath = public_path('uploads/images/admins');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }

            if (Admin::create($data)) {    //hamro admins bhanne table Admin bhanne model sanga related chha so..
                return redirect()->route('admin')->with('success', 'Data is inserted');

            }
        }
    }

    public function updateStatus(Request $request)
    {
        if ($request->isMethod('get')) {  //get bata aauchha bhane return back
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;    //criteria bhanne name deko chha hidden method bata aako ho jun chai hamro id ho..
            $admin = Admin::findorFail($criteria);

            if (isset($_POST['active'])) {
                $admin->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $admin->status = 1;
            }

            if ($admin->update()) {
                return redirect()->route('admin')->with('success', 'Status is updated successfully');
            }
        }

        return false;

    }

    public function updateType(Request $request)
    {
        if ($request->isMethod('get')) {  //get bata aauchha bhane return back
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;    //criteria bhanne name deko chha hidden method bata aako ho jun chai hamro id ho..
            $admin = Admin::findorFail($criteria);

            if (isset($_POST['admin'])) {
                $admin->user_type = 'user';
            }
            if (isset($_POST['user'])) {
                $admin->user_type = 'admin';
            }

            if ($admin->update()) {
                return redirect()->route('admin')->with('success', 'User Type is updated successfully');
            }
        }

        return false;

    }

    public function deleteFile($id)  //userko related image delete garna ko lagi
    {
        $criteria = $id;
        $findData = Admin::findOrFail($criteria); //Admin bhanne model ma database ko model chha, ani tesko criteria = id ho
        $filename = $findData->image;
        $deletePath = public_path('uploads/images/admins/' . $filename);
        if (file_exists($deletePath) && is_file($deletePath)) {  //$delepath ma item file chha ra file ho bhane..delete garne
            return unlink($deletePath);
        }
        return true;  //image nahuda ni delete garna
    }


    public function deleteUser(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Admin::findOrFail($criteria);
        if ($this->deleteFile($criteria) && ($findData->delete())) {

            return redirect()->route('admin')->with('success', 'Data is deleted');
        }


    }

    public function editUser(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Admin::findOrFail($criteria);
        $this->data('adminData', $findData);
        return view($this->pagePath . 'admins.edit-user', $this->data);


    }

    public function editUserAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'fullname' => 'required|min:3|max:50',
                'username' => 'required|min:3|max:20|', [
                    Rule::unique('admins', 'username')->ignore($criteria)  //yo username ra email unique hunuparchha bhanne rule lai ignore garchha
                ],
                'email' => 'required|email|', [
                    Rule::unique('admins', 'email')->ignore($criteria)
                ],
                'upload' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $data['fullname'] = $request->fullname;
            $data['username'] = $request->username;
            $data['email'] = $request->email;

            //file upload...
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;   //imageko name override nahos vanera md5 gareko ani chadai name change garnalai microtime
                $uploadPath = public_path('uploads/images/admins');
                if ($this->deleteFile($criteria) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;

                }


            }

            if (Admin::where('id', '=', $criteria)->update($data)) {
                return redirect()->route('admin')->with('success', 'Data is updated');


            }

        }
    }
}
