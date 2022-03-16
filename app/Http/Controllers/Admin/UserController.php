<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Contracts\Services\UserContract;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserContract $userService)
    {
        $this->userService = $userService;

    }
    public function getAllUsers()
    {
        return $this->userService->getAllUsers();
    }

    public function createUser(Request $request)
    {
        return response()->json($this->userService->createUser($request));
    }

    public function editUser($id)
    {
        return $this->userService->editUser($id);
    }

    public function updateUser(Request $request)
    {
        // return $this->userService->updateUser($request);
        if($this->userService->updateUser($request)){
            return response()->json('User Updated successfully!');
        }else{
            return response()->json('User not Updated!');
        }

    }

    public function deleteUser($id)
    {

         if($this->userService->deleteUser( (int) $id)){
             return response()->json('Deleted successfully!');
         }
         else{
             return response()->json('Error!');
         }

//        return $this->userService->deleteUser( (int) $id);
    }



}
