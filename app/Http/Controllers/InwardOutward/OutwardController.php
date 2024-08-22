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
use Illuminate\Support\Arr;


class OutwardController extends AdminController
{
    public function index(){
        $deliverymode = Deliverymode::latest()->get();
        $lettertype = Lettertype::latest()->get();
        $ward =Ward::latest()->get();
        $inward_data =inward::latest()->get();
        $department_data = Department::latest()->get();
        return view('outward.outward_list')->with(['inward_datas'=>$inward_data,'deliverymode_data'=>$deliverymode,'lettertypes'=>$lettertype,'wards'=>$ward,'department'=>$department_data]);
     }

    // public function edit() {
    //     dd('test');
    // }
    public function edit($id)
    {
        try {
            // Find the outward file by ID
            $inwardFile = inward::findOrFail($id);

            // Return the data as JSON (for AJAX)
            return response()->json([
                'success' => true,
                'data' => $inwardFile
            ]);
        } catch (\Exception $e) {
            // Handle errors
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }




}
