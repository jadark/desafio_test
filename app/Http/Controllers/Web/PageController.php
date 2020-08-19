<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\CommentStore;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSend;
use App\Publication;
use App\Comment;

class PageController extends Controller
{
    public function blog(){
        $posts = Publication::orderBy('id', 'DESC')->where('status', 'APROBADO')->paginate(10);
        return view('web.posts', compact('posts'));
    }

    public function post($slug){
        $post = Publication::where('slug', $slug)->first();
        $commentsByUser = Publication::whereHas('comments', function (Builder $query) use ($post) {
            $query->where('user_id', Auth::id())->where('publication_id', $post->id);
        })->exists();
        $post->hasCommentLoggedUser = $commentsByUser;
        return view('web.post', compact('post'));
    }

    public function storeComment(CommentStore $request){
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->publication_id = $request->publication_id;
        $comment->content = $request->content;
        $comment->save();
        Mail::to(Auth::user()->email)->send(new EmailSend);
        return back()->with('info', 'Comentario enviado');
        // $post = Comment::create($request->all());
        // return back()->with('info', 'Eliminado correctamente');
    }
}
