<?php

namespace App\Services;

use App\Contracts\Services\TagContract;
use App\Contracts\Repositories\TagRepository;
use Illuminate\Http\Request;
use Validator;

class TagService implements TagContract
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;

    }

    public function getAllTags()
    {
        return $this->tagRepository->getAllTags();

    }

    public function createTag($request){
        //validation
        $rules = [
            'tag_value' => 'required|unique:tags',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $tag = [
//          'user_id' => '1',
            'tag_value' => $request->tag_value
        ];
        // dd($request->all());
        $this->tagRepository->createTag($tag);
    }

//    public  function editTag($id){
//        return $this->tagRepository->editTag($id);
//    }

//    public function updateTag($request){
//
//        //validation
//        $rules = [
//            'tag_value' => 'required|unique:tags,tag_value, ' . (int) $request['id'],
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json($validator->errors());
//        }
//
//        $tag = [
//            'tag_value' => $request->tag_value
//        ];
//
//        return $this->tagRepository->updateTag($tag, (int) $request['id']);
//    }

    public function deleteTag($id){
        return $this->tagRepository->deleteTag($id);
    }
}
