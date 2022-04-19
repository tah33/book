<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageStore;

    public function index()
    {
        try {
            $data = [
                'setting' => Setting::first()
            ];
            return view('backend.setting', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery_charge' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => "required"
        ]);
        try {
            $logo = $this->saveImage('logo-' . uniqid() . '.png', $request->logo, 'uploads/image/', $request->logo);
            $favicon = $this->saveImage('favicon-' . uniqid() . '.png', $request->favicon, 'uploads/image/', $request->favicon);

            $setting = Setting::first();

            $setting->update([
                'delivery_charge' => $request->delivery_charge,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'logo' => $logo,
                'favicon' => $favicon,
            ]);

            Toastr::success('Setting Updated Successfully :)', 'Success!!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
