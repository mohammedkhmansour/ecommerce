<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testemonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestemonialController extends Controller
{
    public function index()
    {
        $testemonials = Testemonial::latest()->get();
        return view('dashboard.testemonials.index',compact('testemonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testemonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('image_testemonial');

        if ($request->hasFile('image_testemonial')) {


            $file = $request->file('image_testemonial');
            if ($file->isValid()) {
                $file = $request->file('image_testemonial');
                $data['image_testemonial']  = $file->store('testemonial',['disk'=>'public']);

            }
        }

        Testemonial::create($data);

        // event('settings.updated');
        return redirect()->route('testemonials.index')
            ->with('success', 'Settings saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testemonials = Testemonial::findOrFail($id);
        return view('dashboard.testemonials.edit',compact('testemonials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testemonial = Testemonial::findOrFail($id);

        $data = $request->except('image_testemonial');
        $old_image = $testemonial->image_testemonial;

        $new_image = $request->file('image_testemonial');
        if($new_image){
            $data['image_testemonial'] = $new_image;
        }

        if ($request->hasFile('image_testemonial')) {


            $file = $request->file('image_testemonial');
            if ($file->isValid()) {
                $file = $request->file('image_testemonial');
                $data['image_testemonial']  = $file->store('testemonial',['disk'=>'public']);

            }
        }

        $testemonial->update($data);

        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }

        // event('settings.updated');
        return redirect()->route('testemonials.index')
            ->with('success', 'Settings saved.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testemonial = Testemonial::findOrFail($id);
        // $this->authorize('delete', $category);

        $testemonial->delete();

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('testemonials.index');
    }
}
