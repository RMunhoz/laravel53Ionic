<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\CategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->paginate(7);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        //$data = $request->all();
        $this->repository->create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        return redirect()->route('categories.index');
    }
}
