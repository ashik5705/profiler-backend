<?php

namespace App\Contracts\Repositories;

interface TagRepository
{
    public function getAllTags();
    public function createTag($tag);
//    public function editTag($id);
//    public function updateTag($tag, $id);
    public function deleteTag($id);
}
