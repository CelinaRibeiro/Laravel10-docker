<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin.supports.index', [
            'supports' => $supports
        ]);
    }

    public function show($id) 
    {
        $support = Support::findOrFail($id);

        if(!$support) {
            return redirect()->back();
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
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()
            ->route('supports.index');
    }

    public function edit($id) 
    {
        $support = Support::findOrFail($id);

        if(!$support) {
            return redirect()->back();
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

       $support->update($request->only([
        'subject', 'body'
       ]));

       return redirect()
            ->route('supports.index');

    }

    public function destroy($id) 
    {
        $support = Support::findOrFail($id);

        if(!$support) {
            return redirect()->back();
        }

       $support->delete();

       return redirect()
            ->route('supports.index');

    }

}
