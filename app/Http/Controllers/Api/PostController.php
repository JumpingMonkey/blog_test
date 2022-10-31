<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $posts = Post::with('categories')->get();
        if (count($posts) < 1){
            $posts = 'No posts available';
        }
        return $this->sendResponse($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $post = new Post();
        $post = $post->create($validated);

        if ($request->category_id){
            $category = Category::find($request->category_id);
            $post->categories()->attach($category);
        }
        $post->categories;
        return $this->sendResponse($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        return $this->sendResponse($post->with('categories')->findOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest $request
     * @param  Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $post = Post::findOrFail($post->id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->categories()->sync($request->category_id);
        $post->save();
        $post->categories;

        return $this->sendResponse($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $this->sendResponse('post was deleted');
    }
}
