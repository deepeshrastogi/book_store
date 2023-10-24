<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Traits\CommonTrait;
use Illuminate\Support\Facades\Http;
use App\Jobs\BooksImportJob;
use Config;

class BookController extends Controller
{
    use CommonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        return view('books.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        return view('books.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:books',
                'author' => 'required',
                'genre' => 'required',
                'isbn' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg|max:2048',
                'published' => 'required',
                'publisher' => 'required',
                'description' => 'required',
                'active' => 'required',
            ]
        );
        $imgName = null;
        if ($request->hasFile('image')) {
            $imagePath = public_path('/uploads/book_image');
            $imgName = $this->uploadFile($request,$imagePath);
        }
        $books = new Books();
        $books->title = $request->title;
        $books->author = $request->author;
        $books->genre = $request->genre;
        $books->isbn = $request->isbn;
        $books->image = $imgName;
        $books->published = $request->published;
        $books->publisher = $request->publisher;
        $books->description = $request->description;
        $books->active = $request->active;
        $books->save();
        return redirect()->back()->withSuccess('New Book has been added successfully !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,Books $book)
    {
        $data['book'] = $book;
        return view('books.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Books $book)
    {
       $data['book'] = $book;
        return view('books.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
        $request->validate(
            [
                'title' => 'required|unique:books,title,'.$book->id,
                'author' => 'required',
                'genre' => 'required',
                'isbn' => 'required',
                'image' => 'mimes:jpg,png,jpeg|max:2048',
                'published' => 'required',
                'publisher' => 'required',
                'description' => 'required',
                'active' => 'required',
            ]
        );
        $imgName = $book->image;
        if ($request->hasFile('image')) {
            $imagePath = public_path('/uploads/book_image');
            $filePath = $imagePath.'/'.$imgName;
            $request->request->add(['file_path' => $filePath]);
            $imgName = $this->uploadFile($request,$imagePath);
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->isbn = $request->isbn;
        $book->image = $imgName;
        $book->published = $request->published;
        $book->publisher = $request->publisher;
        $book->description = $request->description;
        $book->active = $request->active;
        $book->save();
        return redirect()->back()->withSuccess('Book has been updated successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Books::find($id)->delete();
        return redirect()->back()->withSuccess('Book has been deleted successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function booksList(Request $request){
        $books = Books::orderBy('id','desc')->paginate(10);
        $data = ['books' => $books];
        $html = view('books.list',$data)->render();
        $responseArr = [ 
            'books' => $books,
            'status' => true,
            'html' => $html,
            'message' => 'success',
        ];
        return response()->json($responseArr, 200);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function bulkImportBooks(){
        
        $apiURL = Config("constant.BOOKS_BULK_UPLOAD_API_URL");
        $response = Http::get($apiURL);
  
        $statusCode = $response->status();
        if($statusCode == 200){
            $responseBody = json_decode($response->getBody(), true);
            if(!empty($responseBody['data'])){
                BooksImportJob::dispatch($responseBody['data']);
            }
            $responseArr = [ 
                'status' => true,
                'message' => 'success',
            ];
            redirect()->back()->withSuccess('Bulk data imported, Please execute "php artisan queue:work" command on your terminal !!!');
        }else{
            $responseArr = [ 
                'status' => false,
                'message' => 'success',
            ];
            redirect()->back()->withWarning('Something went wrong !!!');
        }
        return response()->json($responseArr, 200);
    }
}
