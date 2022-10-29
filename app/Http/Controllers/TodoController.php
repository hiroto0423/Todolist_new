<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index () {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = $user->todos;
        return view('index',['todos'=>$todos, 'user' => $user, 'tags' => $tags]);
    }

    public function create (TodoRequest $request) {
        $new = $request->all();
        $new['user_id'] = Auth::id();
        Todo::create($new);
        return redirect('/');

    }

    public function update (TodoRequest $request,Todo $todo) {
        $form_content = $request->all();
        unset($form_content['_token']);
        $todo->fill($form_content)->save();
        return redirect('/');
    }

    public function delete (Todo $todo) {
        $todo->delete();
        return redirect('/');
    }

    public function find () {
        $user = Auth::user();
        $todos = [];
        $tags = Tag::all();
        return view('find',['user' => $user , 'todos' => $todos , 'tags' => $tags]);
    }

    public function search (Request $request) {
        $user = Auth::user();
        $keyword_content = $request->content;
        $keyword_tag = $request->tag_id;
        $todos =[];
        $todos = Auth::user()->todos()
            ->where('content', 'LIKE', '%'.$keyword_content.'%')
            ->orwhere('tag_id','=', $keyword_tag)
            ->get();
        $tags = Tag::all();
        return view('find',['user' => $user , 'todos' => $todos , 'tags' => $tags]);
    }

    public function search_update (TodoRequest $request,Todo $todo) {
        $form_content = $request->all();
        unset($form_content['_token']);
        $todo->fill($form_content)->save();
        return redirect('/todo/find');
    }
}
