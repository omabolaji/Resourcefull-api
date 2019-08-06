<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Book;
class BookController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api')->except(['index', 'show']);
        // 'jwt.verify'
        $this->middleware('jwt.verify')->except(['index', 'show']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('ratings')->orderBy('created_at', 'DESC')->paginate(10);
        return BookResource::collection($books);
                // or this
        // return BookResource::collection(Book::with('ratings')->orderBy('created_at', 'desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description 
            ]);
        return new BookResource($book);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if($request->user()->id !== $book->user_id)
        {
            return response()->json(['error' => 'You can only edit/Update your own book!'], 403);
        }
        $book->update($request->only(['title', 'description']));
        $book->save();
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
