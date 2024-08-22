<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreDeliverymodeRequest;
use App\Http\Requests\Admin\Masters\UpdateDeliverymodeRequest;
use App\Models\Deliverymode;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeliverymodeConroller extends Controller
{
    public function index()
    {
        $Deliverymode_data = Deliverymode::latest()->get();


        return view('admin.masters.deliverymode')->with(['Deliverymode_data'=> $Deliverymode_data]);
    }

    public function store(StoreDeliverymodeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Deliverymode::create( Arr::only( $input, Deliverymode::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Office created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Deliverymode');
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(Deliverymode $deliverymode)
    {
        if ($deliverymode)
        {
            $response = [
                'result' => 1,
                'Deliverymode' => $deliverymode,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateDeliverymodeRequest $request, Deliverymode $deliverymode)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $deliverymode->update( Arr::only( $input, Deliverymode::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Deliverymode updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Deliverymode');
        }
    }

    public function destroy(Deliverymode $deliverymode)
    {
        try
        {
            DB::beginTransaction();
            $deliverymode->delete();
            DB::commit();

            return response()->json(['success'=> 'Deliverymode deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Deliverymode');
        }
    }
}
