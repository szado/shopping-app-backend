<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use ResponseTrait;

    protected $category;

    public function __construct(
        Category $category
    ) {
        $this->category = $category;
    }

    public function index() {
        $data = $this->category->all();

        $this->setData($data);

        return $this->baseResponse();
    }
}
