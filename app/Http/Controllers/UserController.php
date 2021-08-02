<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $items = User::all();
        return $this->returnData($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return $this->returnSuccess('The Data Stored Successfully!', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->returnData($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return $this->returnSuccess('The Item Updated Successfully!', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->returnSuccess('The Item Deleted Successfully!');
    }
}
