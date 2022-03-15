<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use App\Models\Tag;
use App\Contracts\Services\TagContract;

class TagController extends Controller
{
    private $tagService;

    public function __construct(TagContract $tagService)
    {
        $this->tagService = $tagService;

    }
    public function getAllTags()
    {
        return $this->tagService->getAllTags();
    }

    public function createTag(Request $request)
    {
        return $this->tagService->createTag($request);
//        if($this->tagService->createTag($request))
//        {
//            return response()->json('Tag Inserted successfully!');
//
//        } else {
//            return response()->json('Tag not Inserted!');
//        }

    }

//    public function editTag($id)
//    {
//        return $this->tagService->editTag($id);
//    }

//    public function updateTag(Request $request)
//    {
//         return $this->tagService->updateTag($request);
////        if($this->tagService->updateTag($request)){
////            return response()->json('Tag Updated successfully!');
////        }else{
////            return response()->json('Tag not Updated!');
////        }
//
//    }

    public function deleteTag($id)
    {

        if($this->tagService->deleteTag( (int) $id)){
            return response()->json('Deleted successfully!');
        }
        else{
            return response()->json('Error!');
        }

//        return $this->userService->deleteUser( (int) $id);
    }



}
