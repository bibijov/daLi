<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(){
        return Comment::all();
    }

    public function store(Request $request){
        return Comment::create($request->all());

    }

}
