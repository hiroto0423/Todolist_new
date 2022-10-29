@extends('layouts.parent')

@section('content')
  <div class="card">
  <div class="card__header">
      <h1 class="card__title">タスク検索</h1>
      <div class="card__user">
        @if (Auth::check())
        <p class="card__user-login">「{{$user->name}}」でログイン中</p>
        @endif
        <form action="/logout" method="post">
          @csrf
          <input class="card__user-logout btn" type="submit"value="ログアウト">
        </form>
      </div>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <li class="card__error-li">{{$error}}</li>
      @endforeach
    @endif
    <form action="/todo/search"method="post"class="card__add-form">
        @csrf
        <input type="text"name="content"class="card_add-text">
        <select name="tag_id" id=""class="tag">
          <option disabled selected value></option>
          @foreach ($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endforeach
        </select>
        <input type="submit"name="submit"value="検索"class="card__add-button btn">
      </form>
    <table class="todo__table">
      <tbody>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>タグ</th>
          <th>更新</th>
          <th>消去</th>
        </tr>
        @foreach ($todos as $todo) 
          <tr>
            <td>{{$todo->created_at}}</td>
            <form action="/todo/search/{{$todo->id}}"method="post">
              @csrf
              @method('PUT')
              <td><input type="text"class="todo__table-inp"value="{{$todo->content}}"name="content"></td>
              <td>
                <select name="" id=""class="tag">
                  @foreach ($tags as $tag)
                  <option {{ $todo->selectedTag($tag->id) }} value="{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <input type="submit"class="todo__table-update btn"value="更新">
              </td>
            </form>
            <td>
              <form action="/{{$todo->id}}"method="post">
                @csrf
                @method('DELETE')
                <input type="submit"value="消去"class="todo__table-delete btn">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <a href="/"class="btn back">戻る</a>
  </div>
@endsection
