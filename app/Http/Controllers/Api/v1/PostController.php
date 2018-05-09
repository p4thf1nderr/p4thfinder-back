<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformer\PostTransformer;

class PostController extends Controller
{
    /**
     * список постов
     *
     * @return json
     */
    public function index()
    {
        return $this->collection(Post::all(), new PostTransformer);    
    }


    /**
     * пост детельно
     *
     * @param [type] $id
     * @return void
     */
    public function show($id) {
        // return post
    }

    /**
     * создание поста
     *
     * @return void
     */
    public function store() {

    }

    /**
     * редактирование поста
     *
     * @param [type] $id
     * @return void
     */
    public function update($id) {

    }
}
