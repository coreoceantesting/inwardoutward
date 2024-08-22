<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreVipRequest;
use App\Http\Requests\Admin\Masters\UpdateVipRequest;
use App\Models\Vip;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class VipController extends Controller
{
    public function index()
    {
        $Vip_data = Vip::latest()->get();


        return view('admin.masters.vip')->with(['Vip_data'=> $Vip_data]);
    }


    public function store(StoreVipRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Vip::create( Arr::only( $input, Vip::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Vip created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Vip');
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(Vip $vip)
    {
        if ($vip)
        {
            $response = [
                'result' => 1,
                'vip' => $vip,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateVipRequest $request, Vip $vip)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $vip->update( Arr::only( $input, Vip::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'lettertype updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'lettertype');
        }
    }

    public function destroy(Vip $vip)
    {
        try
        {
            DB::beginTransaction();
            $vip->delete();
            DB::commit();

            return response()->json(['success'=> 'vip deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'lettertype');
        }
    }
}
