<?php

namespace App\Services;

use App\Contracts\Repositories\TagRepository;
use App\Contracts\Services\UserContract;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserService implements UserContract
{
    private $userRepository, $tagRepository;

    public function __construct(UserRepository $userRepository, TagRepository $tagRepository)
    {
        $this->userRepository = $userRepository;
        $this->tagRepository = $tagRepository;

    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();

    }

    public function getLastUser(){
        return $this->userRepository->getLastUser();
    }

    public function createUser($request){
        //validation
        $rules = [
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = [
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ];

        $userData = $this->userRepository->createUser($user);

        $tag = [
            'user_id' => $this->getLastUser()->id,
            'tag_value' => '$request->tag_value',
        ];
        $tagData = $this->tagRepository->createTag($tag);
    }

    public  function editUser($id){
        return $this->userRepository->editUser($id);
    }

    public function updateUser($request){

        //validation
        $rules = [
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email, ' . (int) $request['id'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = [
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ];

        return $this->userRepository->updateUser($user, (int) $request['id']);
    }

    public function deleteUser($id){
        return $this->userRepository->deleteUser($id);
    }


}
