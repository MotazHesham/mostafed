<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Admin\MassDestroyFaqCategoryRequest;
use App\Http\Requests\Tenant\Admin\StoreFaqCategoryRequest;
use App\Http\Requests\Tenant\Admin\UpdateFaqCategoryRequest;
use App\Models\FaqCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FaqCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('faq_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faqCategories = FaqCategory::all();

        return view('tenant.admin.faqCategories.index', compact('faqCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('faq_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.faqCategories.create');
    }

    public function store(StoreFaqCategoryRequest $request)
    {
        $faqCategory = FaqCategory::create($request->all());

        return redirect()->route('admin.faq-categories.index');
    }

    public function edit(FaqCategory $faqCategory)
    {
        abort_if(Gate::denies('faq_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.faqCategories.edit', compact('faqCategory'));
    }

    public function update(UpdateFaqCategoryRequest $request, FaqCategory $faqCategory)
    {
        $faqCategory->update($request->all());

        return redirect()->route('admin.faq-categories.index');
    }

    public function show(FaqCategory $faqCategory)
    {
        abort_if(Gate::denies('faq_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.faqCategories.show', compact('faqCategory'));
    }

    public function destroy(FaqCategory $faqCategory)
    {
        abort_if(Gate::denies('faq_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faqCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyFaqCategoryRequest $request)
    {
        $faqCategories = FaqCategory::find(request('ids'));

        foreach ($faqCategories as $faqCategory) {
            $faqCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
