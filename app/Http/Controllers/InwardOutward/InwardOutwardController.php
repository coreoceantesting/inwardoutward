<?php

namespace App\Http\Controllers\InwardOutward;
use App\Http\Controllers\Admin\Controller as AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deliverymode;
use App\Models\Lettertype;
use App\Models\inward;
use App\Models\Ward;
use App\Http\Requests\Admin\Masters\StoreInwardRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class InwardOutwardController extends AdminController
{
    public function index(){

       $deliverymode = Deliverymode::latest()->get();
       $lettertype = Lettertype::latest()->get();
       $ward =Ward::latest()->get();
       return view('inward.new_inward')->with(['deliverymode_data'=>$deliverymode,'lettertypes'=>$lettertype,'wards'=>$ward]);
    }



    public function store(StoreInwardRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

            $latestInward = inward::orderBy('id', 'DESC')->first();

            $newIdNumber = $latestInward ? ($latestInward->id + 1) : 1;
            $formattedId = 'GEN/' . date('Y') . '/' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);
// dd($formattedId );
            $input['formatted_id'] = $formattedId;
            // dd($input['formatted_id'] );
            // Create the inward record with the generated formatted_id
            inward::create(Arr::only($input, inward::getFillables()));

            DB::commit();

            return response()->json(['success' => 'Inward created successfully!']);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return $this->respondWithAjax($e, 'creating', 'inward');
        }
    }

    public function update(Request $request, $inwardfile)
    {
        // dd('test');
        // Validate the request data
        $request->validate([
            'department_id' => 'required|exists:departments,id',
        ]);

        // // Find the Inward record by ID
        $inward = Inward::findOrFail($inwardfile);

        // // Update the fields
        $inward->department_id = $request->input('department_id');
        $inward->send_inward = '1';  // Or any other status you want to set

        // // Save the changes
        $inward->save();

        // // Return a response
        // return response()->json(['message' => 'Inward status and department updated successfully!'], 200);
    }
}
