<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BooksStore;
use App\Http\Resources\BooksStoreResource;
use App\Http\Requests\BooksStorePostRequest;
use Symfony\Component\HttpFoundation\Response;
use Session;

class BooksStoreController extends Controller
{
    public function index(Request $request)
    {
        $author_search      = $request->author;
        $book_name_search   = $request->book_name;
        $date_search        = $request->date;
        $best_seller_true   = $request->best_seller_true;
        $best_seller_false  = $request->best_seller_false;


        $books_store = BooksStore::latest();

        if($author_search) {
            $books_store->where("author" , $author_search);
        }

        if($book_name_search) {
            $books_store->where("book_name" , $book_name_search);
        }

        if($date_search) {
            $exploded_dates = explode(" to " , $date_search);
            $start_date     = isset($exploded_dates[0])?$exploded_dates[0]:'';
            $end_date       = isset($exploded_dates[1])?$exploded_dates[1]:'';
            $books_store->where("publish_year" , ">=" , date("Y-m-d" , strtotime($start_date)));
            $books_store->where("publish_year" , "<=" , date("Y-m-d" , strtotime($end_date)));
        }
        
        if($best_seller_true=='true' && $best_seller_false!='true') {
            $books_store->where("best_seller" , 1);
        }else if($best_seller_true!='true' && $best_seller_false=='true') {
            $books_store->where("best_seller" , 0);
        }

        $data['books_store'] = BooksStoreResource::collection($books_store->get());

        return view('index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksStorePostRequest $request)
    {
        $post_data = [
            'author'        => $request->author,
            'book_name'     => $request->book_name,
            'publish_year'  => $request->publish_year,
            'best_seller'   => $request->best_seller=='true'?1:0,
        ];

        BooksStore::create($post_data);
        return redirect()->route('index')->with('message', 'Record inserted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BooksStorePostRequest $request , $id)
    {
        $BooksStore = BooksStore::find($id);
        $BooksStore->author = $request->author;
        $BooksStore->book_name = $request->book_name;
        $BooksStore->publish_year = $request->publish_year;
        $BooksStore->best_seller = $request->best_seller=='true'?1:0;
        $BooksStore->save();

        return redirect()->route('index')->with('message', 'Record updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        
    }

    public function destroy(Request $request , $id)
    {
        BooksStore::destroy($id);
        return redirect()->route('index')->with('message', 'Record deleted successfully.');
    }
}
