<?php namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Modules\Blog\Http\Requests\StorePostRequest;
use Modules\Blog\Repositories\CategoryRepository;
use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PostController extends AdminBaseController
{
    /**
     * @var PostRepository
     */
    private $post;
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        parent::__construct();

        $this->beforeFilter('permissions');

        $this->post = $post;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = $this->post->all();

        return View::make('blog::admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->all();

        return View::make('blog::admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return Response
     */
    public function store(StorePostRequest $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('collection.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}