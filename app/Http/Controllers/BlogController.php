<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Slide;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index')->with([
            'title'         => 'Beranda',
            'slides'        => Slide::all(),
            'categories'    => Category::all(),
            'articles'      => Article::orderBy('created_at', 'desc')->paginate(1)->withQueryString(),
            'views'         => Article::latest()->take(5)->get(),
            'label'         => 'ini rumah'
        ]);
    }

    public function article()
    {
        $articles = Article::latest();
        $filter   = '';
        $filter_name = '';

        if (request('cari')) {
            $articles->where('judul', 'like', '%' . request('cari') . '%')
                ->orWhere('isi', 'like', '%' . request('cari') . '%');

            $filter = request('cari');
            $filter_name = 'hasil pencarian';
        }

        if (request('kategori')) {
            $category = Category::firstWhere('slug', request('kategori'));
            $articles->where('category_id', $category->id);

            $filter = $category->nama;
            $filter_name = 'kategori';
        }

        if (request('tag')) {
            $tag = Tag::firstWhere('slug', request('tag'));
            $articles->whereHas('tags', function ($query) {
                $query->where('slug', request('tag'));
            });

            $filter = $tag->nama;
            $filter_name = 'tag';
        }

        return view('blog.artikel')->with([
            'title'         => 'artikel',
            'categories'    => Category::all(),
            'articles'      => $articles->paginate(1)->withQueryString(),
            'filter'        => $filter,
            'filter_name'   => $filter_name,
            'views'         => Article::orderBy('view', 'desc')->take(5)->get(),
            'label'         => 'artikel Populer'
        ]);
    }

    public function detail(Article $article)
    {
        $article->increment('view');

        return view('blog.detail')->with([
            'title'         => 'Artikel Detail',
            'categories'    => Category::all(),
            'article'       => $article,
            'views'         => Article::latest()->take(5)->get(),
            'label'         => 'artikel terbaru'
        ]);
    }
}
