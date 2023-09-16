<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Outl1ne\PageManager\Helpers\NPMHelpers;

class PageController extends Controller
{
    public function show($slug)
    {
        $pages = cache()->remember('page', setting('cache_page', 600), function() {
            return NPMHelpers::getPages();
        });

        foreach ($pages as $page){
            if ($page['slug']['en'] == $slug) {
                return view('pages.page', [
                    'page' => $page,
                ]);
            }
        }

        abort(404);
    }
}
