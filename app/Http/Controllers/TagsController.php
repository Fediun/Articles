<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;

class TagsController extends Controller
{

    public function index(){


        $tags = Tag::orderBy('id', 'desc')->get();


        return view('welcome', compact('tags'));


    }


    public function show(Tag $tag) {


        $articles =  $tag->articles()->orderBy('id', 'desc')->paginate(4);;


        return view('articles.index', compact('articles'));

    }
}
