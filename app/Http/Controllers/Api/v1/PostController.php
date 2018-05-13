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
        return $this->collection(Post::paginate(4), new PostTransformer());
    }


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return array
     */
    public function show($id) {
        return $this->item(Post::findOrFail($id), new PostTransformer());
        //return Post::find($id);
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
