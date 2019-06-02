<?php

namespace App\Http\Controllers\backend;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends BackendController
{
    public function index()
    {
        $sliderData = Slider::orderBy('id', 'DESC')->get();
        $this->data('sliderData', $sliderData);
        return view($this->pagePath . 'sliders.show-sliders',$this->data);
    }

    public function addSlider(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'sliders.add-slider', $this->data);

        }

        if ($request->isMethod('post')) {  //form submit garna lagda..
            $this->validate($request, [
                'title' => 'required|min:3|max:50',
                'description' => 'required|min:3|max:2000',
                'upload' => 'required|mimes:jpg,jpeg,png,gif'
            ]);

            $data['title'] = $request->title;
            $data['description'] = $request->description;

            //file upload...
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;   //imageko name override nahos vanera md5 gareko ani chadai name change garnalai microtime
                $uploadPath = public_path('uploads/images/sliders');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }

            if (Slider::create($data)) {    //hamro admins bhanne table Admin bhanne model sanga related chha so..
                return redirect()->route('slider')->with('success', 'Slider is created');

            }
        }
    }

    public function updateSliderStatus(Request $request)
    {
        if ($request->isMethod('get')) {  //get bata aauchha bhane return back
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;    //criteria bhanne name deko chha hidden method bata aako ho jun chai hamro id ho..
            $slide = Slider::findorFail($criteria);

            if (isset($_POST['active'])) {
                $slide->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $slide->status = 1;
            }

            if ($slide->update()) {
                return redirect()->route('slider')->with('success', 'Status is updated successfully');
            }
        }

        return false;

    }
}

