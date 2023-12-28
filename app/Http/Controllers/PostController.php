<?php

namespace App\Http\Controllers;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository){
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("Post/Index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'imageUrl' => 'image'
        ]);

        // $data = $request->all();

        if ($request->hasFile('imageUrl')) {
            $image_path = $request->file('imageUrl')->store('image', 'public');
            $data['imageUrl'] = $image_path;
        }

        //  var_dump($data['imageUrl']);
        // exit;

        $this->postRepository->createPost($data);
        return  Response( ['imageUrl' => asset('storage/'.$image_path)]);
    }

    public function showAll(){
        $posts = Post::all();

        return response()->json($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
