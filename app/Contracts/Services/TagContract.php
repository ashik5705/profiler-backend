<?php

namespace App\Contracts\Services;


interface TagContract {
    public function getAllTags();
    public function createTag($request);
//    public function editTag($id);
//    public function updateTag($request);
    public function deleteTag($id);
}
