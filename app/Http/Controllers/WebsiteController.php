<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public $categories,$blogs,$blog;
    public function index()
    {
        $this->categories = Category::all();
        $this->blogs = Blog::orderBy('id','desc')->get();
        return view('website.home.index', ['categories' => $this->categories, 'blogs' => $this->blogs]);
    }
    public function category()
    {
        $this->blogs = Blog::all();

        return view('website.category.index',['blogs' => $this->blogs]);
    }
    public function detail($id)
    {
        $this->blog = Blog::find($id);
        $this->blogs = Blog::all();
        return view('website.detail.index',  ['blogs'=>$this->blogs,'blog' => $this->blog]);
    }

}
