<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use App\Offer;
use App\Category;
use Illuminate\Http\Request;

/**
 * Class OffersController
 * @package App\Http\Controllers
 */
class OffersController extends Controller
{
    use ResponseTrait;

    /**
     * @var Offer
     */
    protected Offer $offer;

    /**
     * @var Category
     */
    protected Category $category;

    /**
     * OffersController constructor.
     * @param Offer $offer
     * @param Category $category
     */
    public function __construct(
        Offer $offer,
        Category $category
    ) {
        $this->offer = $offer;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int|null $categoryId
     * @return array
     */
    public function index(?int $categoryId = null): array
    {
        if (!$this->_doesCategoryExists($categoryId)) {
            abort(404);
        }

        $data = $categoryId
            ? $this->offer->where('category_id', $categoryId)
                ->with(['customer', 'category'])
                ->orderBy('created_at', 'desc')
                ->get()
            : $this->offer->with(['customer', 'category'])
                ->orderBy('created_at', 'desc')
                ->get();

        $this->setData($data);

        if (!count($data)) {
            $this->setErrors(['Brak wyników']);
        }

        return $this->baseResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function create()
    {
        return $this->baseResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $model = new $this->offer;
        $data = $request->all();

        try {
            $model->fill($data)->save();
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }

        return $this->baseResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show(int $id)
    {
        $data = $this->offer
            ->with(['customer', 'category'])
            ->findOrFail($id);

        $this->setData($data);

        return $this->baseResponse();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function edit(Request $request, int $id)
    {
        return $this->baseResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        $data = $request->all();
        $model = $this->offer->findOrFail($id);

        try {
            $model->fill($data)->save();
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }

        return $this->baseResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id)
    {
        try {
            $model = $this->offer->findOrFail($id);
            $model->delete();
        } catch(\Exception $exception) {
            $this->setCode(500);
            $this->setErrors([$exception]);

            return $this->baseResponse();
        }

        return $this->baseResponse();
    }

    public function search(Request $request) {
        $queryParams = $request->get('query');
        $data = $this->offer
            ->where('title', 'like', "%{$queryParams}%")
            ->orWhere('description', 'like', "%{$queryParams}%")
            ->get();

        $this->setData($data);

        if (!count($data)) {
            $this->setErrors(['Brak wyników']);
        }

        return $this->baseResponse();
    }

    /**
     * @param int $categoryId
     * @return bool
     */
    private function _doesCategoryExists(?int $categoryId): bool {
        if (empty($categoryId)) {
            return true;
        }

        $category = $this->category->findOrFail($categoryId);

        if (empty($category)) {
            return false;
        }

        return true;
    }
}
