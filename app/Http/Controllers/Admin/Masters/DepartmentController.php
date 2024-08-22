<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreDepartmentRequest;
use App\Http\Requests\Admin\Masters\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('admin.masters.department')->with(['departments'=> $departments]);
    }



    public function store(StoreDepartmentRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Department::create( Arr::only( $input, Department::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Department created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Department');
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(Department $department)
    {
        if ($department)
        {
            $response = [
                'result' => 1,
                'department' => $department,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $department->update( Arr::only( $input, Department::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Department updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Department');
        }
    }

    public function destroy(Department $department)
    {
        try
        {
            DB::beginTransaction();
            $department->delete();
            DB::commit();

            return response()->json(['success'=> 'Department deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Department');
        }
    }
}
