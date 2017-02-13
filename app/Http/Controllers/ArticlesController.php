<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Carbon\Carbon;
use \Auth;
use \App\Tag;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth', ['except' => 'index']);

    }


    public function index() {


        //$articles = Article::latest('published_at')->published()->get();
        //$articles = Article::latest('id')->get();
        $articles = Article::orderBy('id', 'desc')->paginate(3);


        return view('articles.index', compact('articles'));

    }


    public function show($id) {


        $article = Article::findOrFail($id);


        return view('articles.show', compact('article'));

    }


    public function create() {

        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));


    }


    public function store(ArticleRequest $request ) {


        $this->createArticle($request);


        return redirect('articles');

    }


    public function edit($id) {

        $tags = Tag::lists('name', 'id');


        $article = Article::findOrFail($id);


        return view('articles.edit', compact('article', 'tags'));


    }


    public function update($id, Requests\ArticleRequest $request) {



        $article = Article::findOrFail($id);


        $article->update($request->all());

        //$article->tags()->sync($request->input('tag_list'));
        $this->syncTags($article, $request->input('tag_list'));


        return redirect('articles');

    }

    public function syncTags(Article $article, array $tags) {

        $article->tags()->sync($tags);

    }

    public function createArticle (ArticleRequest $request){



        $article = Auth::user()->articles()->create($request->all());


        //$article->tags()->attach($request->input('tag_list'));
        $this->syncTags($article, $request->input('tag_list'));

        return $article;

    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index');
    }


}
