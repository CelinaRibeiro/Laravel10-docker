<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ){ }

    public function index(Request $request)
    {
        // $supports = $support->all();
        $supports = $this->service->getAll($request->filter);

        return view('admin.supports.index', [
            'supports' => $supports
        ]);
    }

    public function show(string $id) 
    {
        // $support = Support::findOrFail($id);

        // if(!$support) {
        //     return redirect()->back();
        // }

        if(!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', [
            'support' => $support
        ]);

    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()
            ->route('supports.index')
            ->with('message', 'Suporte cadastrado com sucesso!');
            
    }

    public function edit(string $id) 
    {
        // $support = Support::findOrFail($id);

        // if(!$support) {
        //     return redirect()->back();
        // }

        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', [
            'support' => $support
        ]);
    }

    
    public function update(StoreUpdateSupport $request, $id) 
    {
        $support = Support::findOrFail($id);

        if(!$support) {
            return redirect()->back();
        }

       $support->update($request->validated());

       return redirect()
            ->route('supports.index')
            ->with('message', 'Suporte atualizado com sucesso!');

    }

    public function destroy(string $id) 
    {
        // $support = Support::findOrFail($id);

        // if(!$support) {
        //     return redirect()->back();
        // }

    //    $support->delete();

     $this->service->delete($id);

       return redirect()
            ->route('supports.index')
            ->with('message', 'Suporte excluído com sucesso!');

    }

}
