<?php

namespace Plugins\Story\Comment;

use Story\Cms\Contracts\StoryPost;

class CommentManager
{
    /**
     * Store user comment by given post_id
     *
     * @param  array  $data
     * @return bool|\Plugins\Story\Comment\Comment
     */
    public function store(array $data)
    {
        $comment = Comment::create([
            'post_id' => $data['post_id'],
            'email' => $data['email'],
            'name' => $data['name'],
            'comment' => $data['comment'],
            'status' => Comment::PENDING
        ]);

        if ($comment) {
            return $comment;
        }
        return false;
    }

    /**
     * Paginate comments
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate()
    {
        return Comment::with('post')->paginate();
    }

    /**
     * Get all comments from given post
     *
     * @param  StoryPost $post
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCommentsFromPost(StoryPost $post)
    {
        return Comment::where('post_id', $post->id)->get();
    }

    /**
     * Display comment form widget
     *
     * @param  StoryPost $post
     * @return Illuminate\View\View
     */
    public function display(StoryPost $post)
    {
        $comments = $this->getAllCommentsFromPost($post);

        return view('story/comment::comment', compact('post', 'comments'));
    }
}
