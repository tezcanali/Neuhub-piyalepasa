<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $blog = Blog::findBySlug($slug);

        if ($blog && $blog->status == 'published') {
            // İçindekiler tablosunu oluştur
            $content = $blog->content;
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true); // HTML5 etiketleri için hata kontrolünü devre dışı bırak
            @$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            libxml_clear_errors();

            $tableOfContents = [];
            $xpath = new \DOMXPath($dom);
            
            // H2 ve H3 başlıklarını topla
            foreach ($xpath->query('//h2|//h3') as $header) {
                $indent = $header->nodeName === 'h3' ? '- ' : '';
                $tableOfContents[] = $indent . trim($header->textContent);
            }

            // Aynı kategoriden rastgele 3 ilgili yazı al
            $relatedPosts = Blog::where('category_id', $blog->category_id)
                ->where('id', '!=', $blog->id)
                ->where('status', 'published')
                ->inRandomOrder()
                ->take(3)
                ->get();

            return view('front.layout.blog', compact('blog', 'tableOfContents', 'relatedPosts'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
