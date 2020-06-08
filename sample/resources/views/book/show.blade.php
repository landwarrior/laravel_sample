@extends('layouts.app')
@section('content')
<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>書籍情報</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <table class="table">
        <tr>
          <th>書籍名</th>
          <td>{{ $book->book_name }}</td>
        </tr>
        <tr>
          <th>価格</th>
          <td>{{ $book->price }}</td>
        </tr>
        <tr>
          <th>著者</th>
          <td>{{ $book->author }}</td>
        </tr>
      </table>
      <a href="/book">戻る</a>
    </div>
  </div>
</div>
@endsection
