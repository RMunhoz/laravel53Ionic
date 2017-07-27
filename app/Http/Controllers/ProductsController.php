<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\ProductRequest;
use CodeDelivery\Models\Category;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;
    private $categoryModel;

    public function __construct(ProductRepository $repository,
                                CategoryRepository $categoryRepository,
                                Category $categoryModel)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $products = $this->repository->paginate(7);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listCategory();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = $this->categoryRepository->listCategory();
        $product = $this->repository->find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('products.index');
    }
}
