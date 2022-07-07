<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class BackendController extends Controller
{
    use ResponseTrait;

    private $viewPath = 'backend.pages.';
    public $mainPath;
    public $headRoute = 'admin.';
    public $mainRoute;
    public $model;
    public $service;

    public function redirectRoute($route): RedirectResponse
    {
        return redirect()->route($this->headRoute . $this->mainRoute . $route);
    }

    public function viewCompact($pathFile, $compact = null): Factory|View|Application
    {
        return isset($compact) ? view($this->viewPath . $this->mainPath . $pathFile, $compact) : view($this->viewPath . $this->mainPath . $pathFile);
    }

    public function viewWith($pathFile, $with = []): Factory|View|Application
    {
        return view($this->viewPath . $this->mainPath . $pathFile)->with($with);
    }

    public function viewErrors($value): bool|RedirectResponse
    {
        return match ($value) {
            '400' => redirect()->route('errors.400'),
            '404' => redirect()->route('errors.404'),
            default => false,
        };
    }

    public function getData($relation = null)
    {
        try {
            $objects = $this->service->query($relation);
            return DataTables::of($objects);
        } catch (Exception $e) {
            return $this->viewErrors(400);
        }
    }

    public function index($compact = null): View|Factory|Application
    {
        return $this->viewCompact('index', $compact);
    }

    public function create($compact = null): View|Factory|Application
    {
        return $this->viewCompact('create', $compact);
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            // 1. Check validation
            $this->validate($request, $this->model::rulesToCreate());
            // 3. Try to create the records
            $createdObject = $this->service->create($request);
            $errors = $this->viewErrors($createdObject);
            if (!$errors) {
                DB::commit();
                // 5. If everything is fine, return to page list
                return $this->redirectRoute('index');
            }
            // 5. When something went wrong return to page error.
            DB::rollBack();
            return $errors;
        } catch (ValidationException $e) {
            DB::rollBack();
            // 2. return to back with fail validation
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function show($id): View|Factory|RedirectResponse|Application
    {
        if ($id) {
            $object = $this->service->getById($id);
            $errors = $this->viewErrors($object);
            if ($errors) {
                return $errors;
            }
            return $this->viewCompact('show', ['object']);
        }
        return $this->viewErrors('404');
    }

    public function edit($id, $compact = null): View|Factory|Application|RedirectResponse
    {
        if ($id) {
            $object = $this->service->getById($id);
            $errors = $this->viewErrors($object);
            if (!$errors) {
                $compact['object'] = $object;
                return $this->viewCompact('edit', $compact);
            }
            return $errors;
        }
        return $this->viewErrors('404');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            // 1. Check validation
            $this->validate($request, $this->model::rulesToUpdate($id));
            // 3. Try to update the records
            $updatedObject = $this->service->updateById($id, $request);
            $errors = $this->viewErrors($updatedObject);
            if (!$errors) {
                DB::commit();
                // 4. If everything is fine, return to page list
                return $this->redirectRoute('index');
            }
            // 5. When something went wrong return to page error.
            DB::rollBack();
            return $errors;
        } catch (ValidationException $e) {
            DB::rollBack();
            // 2. return to back with fail validation
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function delete($id): RedirectResponse
    {
        if ($id) {
            $object = $this->service->delete($id);
            $errors = $this->viewErrors($object);
            if ($errors) {
                return $errors;
            }
            return $this->redirectRoute('index');
        }
        return $this->viewErrors('404');
    }

    public function ajaxDelete($id): JsonResponse
    {
        // 1. Check if id is valid
        if ($id) {
            // 2. Try to delete the records
            $deleteOk = $this->service->delete($id, false);
            // 3. If everything is fine, response success to user
            if ($deleteOk) {
                return $this->success($deleteOk);
            }
            // 4. Say sorry as something went wrong.
            return $this->error($id);
        }
        return $this->unprocessable("Record id is required");
    }

    public function filter()
    {
        return $this->service
            ->selectField(['id', 'name as text'])
            ->orderBy('id', 'ASC')
            ->paginate(10);
    }
}
