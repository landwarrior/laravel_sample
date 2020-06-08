<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * コンストラクタでミドルウェアの auth を呼び出しておけば、認証後じゃないとこのコントローラにアクセスできなくなる
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // DB より Book テーブルの値をすべて取得
        $books = Book::all();

        // 取得した値をビュー「book/index」に渡す
        // compact 関数は、連想配列を簡単に作る仕組み
        // ['books' => $books] と同じ
        return view('book.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function edit($id)
    {
        // DB より URI パラメータと同じ ID を持つ Book の情報を取得
        $book = Book::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('book.edit', compact('book'));
    }

    public function update(BookRequest $request, $id)
    {
        $validated = $request->validated();
        $book = Book::findOrFail($id);
        $book->book_name = $request->book_name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect('/book');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/book');
    }

    public function create()
    {
        // 空の $book を渡す
        $book = new Book();
        return view('book.create', compact('book'));
    }

    /**
     * 書籍情報の保存
     * @param  BookRequest $request
     * @return Response
     */
    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect('/book');
    }
}
