@extends('layouts.app')
@section('content')
<div class="container ops-main">
  <div class="row">
    <div class="col-md-12">
      <h3 class="ops-title">書籍一覧</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <table class="table text-center">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">書籍名</th>
          <th class="text-center">価格</th>
          <th class="text-center">著者</th>
          <th class="text-center">削除</th>
        </tr>
        @foreach($books as $book)
        <tr>
          <td>
            <a href="/book/{{ $book->id }}/edit">{{ $book->id }}</a>
          </td>
          <td>{{ $book->book_name }}</td>
          <td>{{ $book->price }}</td>
          <td>{{ $book->author }}</td>
          <td>
            <form action="/book/{{ $book->id }}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              @csrf
              <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align">
                  <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      <div><a href="/book/create" class="btn btn-primary">新規作成</a></div>
    </div>
  </div>
</div>
@endsection
