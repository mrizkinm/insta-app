<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getPosts(Request $request)
    {
        $userId = $request->user()->id;
        $posts = Post::with('user')
        ->withCount(['likes', 'comments'])
        ->addSelect([
            'is_liked' => function($query) use ($userId) {
                $query->selectRaw('COUNT(*) > 0')
                    ->from('likes')
                    ->whereColumn('likes.post_id', 'posts.id')
                    ->where('likes.user_id', $userId);
            }
        ])
        ->latest()
        ->get();

        $result = $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'content' => $post->content,
                'image_path' => $post->image_path,
                'username' => $post->user->username ?? null,
                'name' => $post->user->name ?? null,
                'likes_count' => $post->likes_count,
                'comments_count' => $post->comments_count,
                'is_liked' => (bool) $post->is_liked,
                'created_at' => $post->created_at->diffForHumans(),
            ];
        });

        return response()->json([
            'data' => $result
        ]);
    }

    public function toggleLike(Request $request, Post $post)
    {
        $userId = $request->user()->id;

        $liked = $post->likes()->where('user_id', $userId)->exists();

        if ($liked) {
            $post->likes()->where('user_id', $userId)->delete();
        } else {
            $post->likes()->create(['user_id' => $userId]);
        }

        return response()->json([
            'is_liked' => !$liked,
            'likes_count' => $post->likes()->count(),
        ]);
    }

    public function postComment(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'content' => $request->content,
        ]);

        $commentsCount = Comment::where('post_id', $post->id)->count();

        return response()->json([
            'message' => 'Comment posted successfully',
            'comment' => [
                'id' => $comment->id,
                'content' => $comment->content,
                'username' => $user->username,
                'created_at' => $comment->created_at->diffForHumans(),
            ],
            'comments_count' => $commentsCount
        ]);
    }

    public function getDetailPost(Request $request, $id)
    {
        $userId = $request->user()->id;

        $post = Post::with('user')
        ->withCount(['likes', 'comments'])
        ->addSelect([
        'is_liked' => function($query) use ($userId) {
            $query->selectRaw('COUNT(*) > 0')
                ->from('likes')
                ->whereColumn('likes.post_id', 'posts.id')
                ->where('likes.user_id', $userId);
        }
        ])
        ->findOrFail($id);

        return response()->json([
            'data' => [
                'id' => $post->id,
                'content' => $post->content,
                'image_path' => $post->image_path,
                'username' => $post->user->username,
                'name' => $post->user->name,
                'likes_count' => $post->likes_count,
                'comments_count' => $post->comments_count,
                'is_liked' => (bool) $post->is_liked,
                'created_at' => $post->created_at->diffForHumans(),
            ]
        ]);
    }

    public function getComments($id)
    {
        $comments = Comment::with('user')
        ->where('post_id', $id)
        ->latest()
        ->get()
        ->map(function ($comment) {
            return [
                'id' => $comment->id,
                'username' => $comment->user->username,
                'name' => $comment->user->name,
                'content' => $comment->content,
                'created_at' => $comment->created_at->diffForHumans(),
            ];
        });

        return response()->json([
            'data' => $comments
        ]);
    }

    public function createPost(Request $request)
    {
        $userId = $request->user()->id;

        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'image'   => 'required|image|max:2048', // max 2MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $imagePath = $request->file('image')->store('posts', 'public');

        $post = Post::create([
            'user_id'    => $userId,
            'content'    => $request->input('content'),
            'image_path' => Storage::url($imagePath),
        ]);

        return response()->json([
            'message' => 'Post created successfully',
            'post'    => $post,
        ]);
    }
}
