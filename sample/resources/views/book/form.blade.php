<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>書籍登録</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">

      @include('book/message')

      @if($target == 'store')
      <form action="/book" method="post">
      @elseif($target == 'update')
      <form action="/book/{{ $book->id }}" method="post">
        <!-- update メソッドには PUT メソッドがルーティングされているので PUT にする -->
        <input type="hidden" name="_method" value="PUT">
      @endif
        @csrf
        <div class="form-group">
          <label for="book_name">書籍名</label>
          <input type="text" class="form-control" name="book_name" value="{{ $book->book_name }}">
        </div>
        <div class="form-group">
          <label for="price">価格</label>
          <input type="text" class="form-control" name="price" value="{{ $book->price }}">
        </div>
        <div class="form-group">
          <label for="author">著書</label>
          <input type="text" class="form-control" name="author" value="{{ $book->author }}">
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
        <a href="/book">戻る</a>
      </form>
    </div>
  </div>
</div>
