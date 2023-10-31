<?php

namespace App\Http\Controllers\Api\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Traits\CommonTrait;
class BookController extends Controller
{
    use CommonTrait;

     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = [];
        $isData = false;
        if($request->filled('search_keyword')){
            $books = Books::search($request->search_keyword)->query(function($query) { 
                $query->addSelect(['id','title','author','published','publisher','isbn','genre']);  
            })->where('active',1)->orderBy('id','desc')->paginate($request->per_page);
            if(!empty($books->toArray()['data'])){
                $isData = true;
            }
        }
        return response()->json(["success" => true, "message" => 'Books lists', "is_data" => $isData, "data" => $books,"error" => (object)[]], 200);
    }

     /**
     * Display the specified resource.
     */
    public function show(Request $request,$id)
    {
        $isData = false;
        $book = Books::select(['id','title','author','published','publisher','isbn','genre','description','image'])->find($id);
        if(!empty($book)){
            $book->image_path = url('/uploads/book_image');
            $isData = true;
        }
        return response()->json(["success" => true, "message" => 'Book details', "is_data" => $isData, "data" => $book,"error" => (object)[]], 200);
    }
}
