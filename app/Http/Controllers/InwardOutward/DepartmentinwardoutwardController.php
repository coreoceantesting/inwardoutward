<?php

namespace App\Http\Controllers\InwardOutward;
use App\Http\Controllers\Admin\Controller as AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\inward;
use App\Models\Ward;
use App\Models\Deliverymode;
use App\Models\Department;
use App\Models\Lettertype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
class DepartmentinwardoutwardController extends AdminController
{
    public function index(){
        $deliverymode = Deliverymode::latest()->get();
        $lettertype = Lettertype::latest()->get();
        $ward =Ward::latest()->get();
        $inward_data = Inward::where('department_id',  Auth::user()->department_id)->latest()->get();
        $department_data = Department::latest()->get();
        return view('acknowlege.acknowlege_list')->with(['inward_datas'=>$inward_data,'deliverymode_data'=>$deliverymode,'lettertypes'=>$lettertype,'wards'=>$ward,'department'=>$department_data]);
    }


    public function incrementField(Request $request, $id)
    {
        $inward = Inward::findOrFail($id);

        $inward->acknowlege = 1;
        $inward->save();

        return response()->json(['success' => true]);
    }

    public function acknowlege_list(){
        $department_data = Department::latest()->get();

        $deliverymode = Deliverymode::latest()->get();
        $lettertype = Lettertype::latest()->get();
        $ward =Ward::latest()->get();
        $acknowlege_list_data = Inward::where('acknowlege',1)->latest()->get();
        return view('acknowlege.acknowlege_accept_list')->with(['acknowlege_list_datas'=>$acknowlege_list_data ,'deliverymode_data'=>$deliverymode,'lettertypes'=>$lettertype,'wards'=>$ward,'department'=>$department_data]);
    }

}
