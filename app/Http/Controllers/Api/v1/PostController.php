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
     * @return array
     */
    public function index()
    {
        return $this->collection(Post::paginate(10), new PostTransformer());
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
     * @param Request $request
     * @return Post
     */
    public function store(Request $request) {

        $args = $request->all();

        $post = new Post();
        $post->title = $args['input']['title'];
        $post->text  = $args['input']['text'];
        $post->save();

        return $post;
    }

    /**
     * редактирование поста
     *
     * @param [type] $id
     * @param Request $request
     * @return Post
     */
    public function update($id, Request $request) {
        $post = Post::findOrFail($id);

        $input = $request->all();

        if (isset($input['title'])) {
            $post->title = $input['title'];
        }

        if (isset($input['text'])) {
            $post->text = $input['text'];
        }

        $post->save();

        return $post;

    }
}
