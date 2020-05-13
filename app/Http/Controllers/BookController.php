<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use File;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->orderBy('book_id', 'asc')->simplePaginate(15);      
        return view('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book=new Book;
        // Image Upload
        $cover=$request->file('book_image');
        $input['imagename']= $request->input('book_id').'.'.$cover->getClientOriginalExtension();
        $destinationPath = public_path('/images/book_covers/');
        $cover->move($destinationPath, $input['imagename']);
        
        $book->book_id=$request->input('book_id');
        $book->book_image=$input['imagename'];
        $book->book_name=$request->input('book_name');
        $book->book_author=$request->input('book_author');
        $book->book_publisher=$request->input('book_publisher');
        $book->book_year=$request->input('book_year');
        $book->book_price=$request->input('book_price');
        $book->book_date_added=$request->input('book_date_added');
        $book->save();
        $msg=$request->input('book_name')." with ID ".$request->input('book_id')." added.";
        return redirect(route('book.add'))->with('status', $msg);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $books = Book::where('book_id', 'LIKE', '%' . $request->search . '%')
          ->orWhere('book_name', 'LIKE', '%' . $request->search . '%')
          ->orWhere('book_author', 'LIKE', '%' . $request->search . '%')
          ->orWhere('book_publisher', 'LIKE', '%' . $request->search . '%')
          ->simplePaginate(15);
           $books->appends(['search' => $request->search]);
        return view('books.search')->with('books',$books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $book_data = Book::where('id', '=', $id)
                                ->first();
    return view('books.edit', compact('book_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Book::where('id', '=', $id)->update([
            'book_name'=>$request->book_name,
            'book_author'=>$request->book_author,
            'book_publisher'=>$request->book_publisher,
            'book_year'=>$request->book_year,
            'book_price'=>$request->book_price,
            'book_date_added'=>$request->book_date_added,
        ]);     
        $msg=$request->input('book_name')." with ID ".$request->input('book_id')." updated.";
        return redirect(route('book.edit',$id))->with('status', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('book_id', '=', $id)->delete();
        return redirect(route('student'))->with('status','Student with ID '.$id.' deleted.');
    }
}
