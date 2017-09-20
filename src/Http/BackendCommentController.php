<?php

namespace Plugins\Story\Comment\Http;

use Story\Cms\Backend\Controllers\Controller;
use Plugins\Story\Comment\CommentManager;

class BackendCommentController extends Controller
{
    protected $comments;

    public function __construct(CommentManager $comments)
    {
        $this->comments = $comments;
    }

    /**
     * Display comment user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->comments->paginate();

        return view('story/comment::backend.index', compact('comments'));
    }
}
