<?php


namespace App\Service;


use App\Models\Block;
use App\Models\Product;
use App\Repositories\BlogRepositories;
use App\Repositories\CategoryRepositories;
use App\Repositories\GalleriesRepositories;
use App\Repositories\ProductRepositories;
use Illuminate\Http\UploadedFile;

class BlockService
{
    protected $productRepositories;
    protected $galleriesRepositories;
    protected $categoryRepositories;
    protected $blogRepositories;
    protected $blocks;

    public function __construct(ProductRepositories $productRepositories, GalleriesRepositories $galleriesRepositories, CategoryRepositories $categoryRepositories, BlogRepositories $blogRepositories)
    {
        $this->productRepositories = $productRepositories;
        $this->galleriesRepositories = $galleriesRepositories;
        $this->categoryRepositories = $categoryRepositories;
        $this->blogRepositories = $blogRepositories;
        $this->blocks = Block::where('status', '!=', 0)->orderBy('position', 'asc')->toBase()->get(['model', 'themplate', 'slug']);
    }

    public function getBlocks()
    {
        $blocks = [];
        foreach ($this->blocks as $block) {
            $repository = $block->model;
            $template = $block->themplate;
            $slug = $block->slug;
//            dump($this->$repository->$template());
            $blocks += array($template => $this->$repository->$template($slug));
        }
        return $blocks;
    }

}
