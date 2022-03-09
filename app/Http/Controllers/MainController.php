<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\GalleriesController;
use App\Service\BlockService;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            (new GalleriesController())->page_views_counter(Auth::check() ? Auth::id() : null);
            return $next($request);
        });
    }

    public function index(BlockService $blockService)
    {
        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        $blocks = $blockService->getBlocks();
        return view('welcome', compact('blocks', 'categories'));
    }
}
