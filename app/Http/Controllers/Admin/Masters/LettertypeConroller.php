<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreLettertypeRequest;
use App\Http\Requests\Admin\Masters\UpdateLettertypeRequest;
use App\Models\Lettertype;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class LettertypeConroller extends Controller
{
    public function index()
    {
        $Lettertype_data = Lettertype::latest()->get();


        return view('admin.masters.lettertype')->with(['Lettertype_data'=> $Lettertype_data]);
    }

    public function store(StoreLettertypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Lettertype::create( Arr::only( $input, Lettertype::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Lettertype created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Lettertype');
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(Lettertype $lettertype)
    {
        if ($lettertype)
        {
            $response = [
                'result' => 1,
                'lettertype' => $lettertype,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateLettertypeRequest $request, Lettertype $lettertype)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $lettertype->update( Arr::only( $input, Lettertype::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'lettertype updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'lettertype');
        }
    }

    public function destroy(Lettertype $lettertype)
    {
        try
        {
            DB::beginTransaction();
            $lettertype->delete();
            DB::commit();

            return response()->json(['success'=> 'lettertype deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'lettertype');
        }
    }
}
