<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResponse;
use App\Http\Requests\PostStoreRule;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ApiResponse;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }


    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function getMine()
    {
        $this->authorize('viewAny', Post::class);
        $posts =  Post::query()->where(['user_id' => Auth::id()])->simplePaginate();

        return $this->getSuccess($posts, 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::query()->simplePaginate();

        return $this->getSuccess($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRule $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $post = Post::query()->create($data);

        return $this->getSuccess($post, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $this->getSuccess($post, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRule $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $post->update($data);

        return $this->getSuccess($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return $this->getSuccess('deleted', 200);
    }
}
