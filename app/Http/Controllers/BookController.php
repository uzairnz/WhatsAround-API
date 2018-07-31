<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }


    public function store(Request $request)
    {
        $book = new Book;
        $book->user_id = $request->input('user_id');
        $book->status = $request->input('status');
        $book->quote_id = $request->input('quote_id');
        $book->partner_id = $request->input('partner_id');


        if ($book->save()) {
            return $book;
        }

        throw new HttpException(400, "Invalid data");
    }


    public function show($id)
    {
        $result = DB::Select('select * from books where bs_id = ?', [$id]);

        return $result;
    }


    public function update(Request $request, $bs_id)
    {
        if (!$bs_id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($bs_id);
        // $user = DB::insert('insert into users (user_id) values (?)', [$user_id]);
        //     * changed default primary key for eloquent from id to user_id in model (User.php)

        $book->user_id = $request->input('user_id');
        $book->status = $request->input('status');
        $book->quote_id = $request->input('quote_id');
        $book->partner_id = $request->input('partner_id');



        if ($book->save()) {
            return $book;
        }

        throw new HttpException(400, "Invalid data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);
        $book->delete();

        return response()->json([
            'message' => 'Booked Service deleted',
        ], 200);
    }

    public function showing($id)
    {
        $result = DB::Select('select * from books where user_id = ?', [$id]);

        return $result;
    }

    public function sholay($id)
    {
        $result = DB::Select('select * from books where partner_id = ?', [$id]);

        return $result;
    }


}
