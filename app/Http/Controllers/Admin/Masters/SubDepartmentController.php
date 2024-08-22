<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreSubDepartmentRequest;
use App\Http\Requests\Admin\Masters\UpdateSubDepartmentRequest;
use App\Models\SubDepartment;
use App\Models\Department;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SubDepartmentController extends Controller
{
    public function index()
    {
        $alldepartment = Department::all();
        $Subdepartments = SubDepartment::with('department')->latest()->get();
        return view('admin.masters.Subdepartment')->with(['Subdepartments'=> $Subdepartments,'alldepartment'=>$alldepartment]);
    }


    public function store(StoreSubDepartmentRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            SubDepartment::create( Arr::only( $input, SubDepartment::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'SubDepartment created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'SubDepartment');
        }
    }

    public function edit(SubDepartment $subdepartment)
    {
        if ($subdepartment)
        {
            $response = [
                'result' => 1,
                'subdepartment' => $subdepartment,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateSubDepartmentRequest $request, SubDepartment $subdepartment)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $subdepartment->update( Arr::only( $input, SubDepartment::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'SubDepartment updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'SubDepartment');
        }
    }

    public function destroy(SubDepartment $subdepartment)
    {
        try
        {
            DB::beginTransaction();
            $subdepartment->delete();
            DB::commit();

            return response()->json(['success'=> 'SubDepartment deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'SubDepartment');
        }
    }
}
