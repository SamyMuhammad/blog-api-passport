<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $items = Role::all();
        return $this->returnData($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        return $this->returnSuccess('The Data Stored Successfully!', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Role $role)
    {
        return $this->returnData($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        return $this->returnSuccess('The Item Updated Successfully!', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return $this->returnSuccess('The Item Deleted Successfully!');
    }
}
