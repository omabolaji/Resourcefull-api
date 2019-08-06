<?php

namespace App\Http\Controllers;
use App\Rating;
use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\RatingResource;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }


    public function store(Request $request, Book $book)
    {
        $rating = Rating::firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'book_id' => $book->id
        ],
             ['rating' => $request->rating]
        ); 

        return new RatingResource($rating);
    }
}
