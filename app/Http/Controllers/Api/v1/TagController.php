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

        $args = $request->all();

        $tag = new Tag();
        $tag->title = $args['input']['title'];
        $tag->save();

        return $tag;
    }

    /**
     * редактирование тега
     *
     * @param [type] $id
     * @param Request $request
     */
    public function update($id, Request $request) {
        $tag = Tag::findOrFail($id);

        $args = $request->all();

        if (isset($args['input']['title'])) {
            $tag->title = $args['input']['title'];
        }

        $tag->save();

        return $tag;
    }
}
