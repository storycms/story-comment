<?php

namespace Plugins\Story\Comment\Http;

use Illuminate\Http\Request;
use Story\Cms\Backend\Controllers\Controller;
use Plugins\Story\Comment\CommentManager;

class CommentController extends Controller
{
    /**
     * The CommentManager implementation.
     *
     * @var Plugins\Story\Comment\CommentManager
     */
    protected $comments;

    /**
     * Create new comment controller instance.
     *
     * @param CommentManager $comments
     */
    public function __construct(CommentManager $comments)
    {
        $this->comments = $comments;
    }

    /**
     * Store comment
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id'
        ]);

        if ($this->comments->store($request->only('email', 'name', 'comment', 'post_id'))) {
            return redirect()->back()->with('message', 'Comment is created');
        }

        return redirect()->back()->with('message', 'Unable to create a comment');
    }
}
