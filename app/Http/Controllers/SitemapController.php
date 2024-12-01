<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Gallery;
use App\Models\Team;
use Filament\Pages\Page;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        $blogs = Blog::all();
        $doctors = Doctor::all();
        $teams = Team::all();
        $galleries = Gallery::all();
        $pages = \Z3d0X\FilamentFabricator\Models\Page::all();

        foreach ($pages as $page) {
            if ($page->slug != '/') {
                $sitemap->add(
                    Url::create("/{$page->slug}")
                        ->setLastModificationDate($page->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );
            }

        }

        foreach ($blogs as $blog) {
            $sitemap->add(
                Url::create("/blog/{$blog->slug}")
                ->setLastModificationDate($blog->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
            );
        }

        foreach ($doctors as $doctor) {
            $sitemap->add(
                Url::create("/doctors/{$doctor->slug}")
                    ->setLastModificationDate($doctor->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        foreach ($teams as $team) {
            $sitemap->add(
                Url::create("/doctors/{$team->slug}")
                    ->setLastModificationDate($team->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        foreach ($galleries as $gallery) {
            $sitemap->add(
                Url::create("/before-after/{$gallery->slug}")
                    ->setLastModificationDate($gallery->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->json(['message' => 'Sitemap generated']);
    }
}
