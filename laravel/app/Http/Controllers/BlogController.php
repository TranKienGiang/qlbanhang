<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $modelBlog;

    public function __construct(Blog $blogs){
        $this->modelBlog = $blogs;
    }

    public function blogshow(){
        $blogs = $this->modelBlog->get();
        return view('viewfashion.blog',['blogs'=>$blogs]);
    }
    public function blogdetail($id){
        $blog = $this->modelBlog->findOrFail($id);
        return view('viewfashion.blog-detail',['blog'=>$blog]);
    }
}
