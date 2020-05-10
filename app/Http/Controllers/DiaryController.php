<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;

class DiaryController extends Controller
{
    public function diary(){
        $user_id = Auth::user()->id;
        $articles = Article::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(3);
        return view('user_pages.diary.diary', compact('articles'));
    }

    public function deleteArticle($id){
        $user_id = Auth::user()->id;
        Article::where('user_id', $user_id)->where('id', $id)->delete();
        return redirect()->to('/diary');
    }

    public function editArticlePage($id){
        $user_id = Auth::user()->id;
        $article = Article::find($id);
        return view('user_pages.diary.edit', compact('article'));
    }

    public function editArticle(Request $r){
        $article = Article::find($r['id']);
        $article->title = $r['title'];
        $article->body = $r['article'];
        $article->image = $r['pic'];
        $article->save();
        return redirect()->to('/diary');
    }

    public function fullarticle($id){
        $article = Article::find($id);
        return view('user_pages.diary.article', compact('article'));
    }

    public function createArticlePage(){
        return view('user_pages.diary.create');
    }

    public function create(Request $r){
        Article::create([
            'user_id' => Auth::user()->id,
            'title' => $r['title'],
            'body' => $r['article'],
            'small_description' => substr($r['article'], 0, 100),
            'image' => $r['pic']
        ]);  
        return redirect()->to('/diary');   
    }
}
