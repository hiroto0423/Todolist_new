<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index () {
        $todos = Todo::all();
        return view('index',['todos'=>$todos]);
    }

    public function create (TodoRequest $request) {
        $new = $request->all();
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
}
