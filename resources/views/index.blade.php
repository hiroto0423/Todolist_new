<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <div class="card">
    <h1 class="card__title">Todo List</h1>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <li class="card__error-li">{{$error}}</li>
      @endforeach
    @endif
    <div class="card__add">
      <form action="/"method="post"class="card__add-form">
        @csrf
        <input type="text"name="content"class="card_add-text">
        <input type="submit"name="submit"value="追加"class="card__add-button">
      </form>
    </div>
    <table class="todo__table">
      <tbody>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>消去</th>
        </tr>
        @foreach ($todos as $todo) 
          <tr>
            <td>{{$todo->created_at}}</td>
            <form action="/{{$todo->id}}"method="post">
              @csrf
              @method('PUT')
              <td><input type="text"class="todo__table-inp"value="{{$todo->content}}"name="content"></td>
              <td>
                <input type="submit"class="todo__table-update"value="更新">
              </td>
            </form>
            <td>
              <form action="/{{$todo->id}}"method="post">
                @csrf
                @method('DELETE')
                <input type="submit"value="消去"class="todo__table-delete">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>