<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformer\TagTransformer;

class TagController extends Controller
{
    /**
     * список тегов
     *
     * @return array
     */
    public function index()
    {
        return Tag::all()->toJson();
    }

    /**
     * создание тега
     *
     * @param Request $request
     * @return Post
     */
    public function store(Request $request) {

       /*  $args = $request->all();

        $post = new Post();
        $post->title = $args['input']['title'];
        $post->text  = $args['input']['text'];
        $post->save();

        return $post; */
    }

    /**
     * редактирование тега
     *
     * @param [type] $id
     * @param Request $request
     */
    public function update($id, Request $request) {
        //
    }
}
