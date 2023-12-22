<?php

namespace App\Repositories;
use App\Http\Resources\PostResource;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    function getAllPosts() {

        return PostResource::collection(Post::all());
    }
    function getPostById($postId) {}
    function deletePost($postId) {}
    function createPost(array $postDetails) {

            return Post::create($postDetails);
    }
    function updatePost($postId, array $newDetails) {}
    function getFulfilledPosts() {}
}
