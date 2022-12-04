<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('dashboard.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('image_slide');

        if ($request->hasFile('image_slide')) {


            $file = $request->file('image_slide');
            if ($file->isValid()) {
                $file = $request->file('image_slide');
                $data['image_slide']  = $file->store('slide',['disk'=>'public']);

            }
        }

        Slider::create($data);

        // event('settings.updated');
        return redirect()->route('sliders.index')
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
        $sliders = Slider::findOrFail($id);
        return view('dashboard.sliders.edit',compact('sliders'));
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
        $sliders = Slider::findOrFail($id);

        $data = $request->except('image_slide');
        $old_image = $sliders->image_slide;

        $new_image = $request->file('image_slide');
        if($new_image){
            $data['image_slide'] = $new_image;
        }

        if ($request->hasFile('image_slide')) {


            $file = $request->file('image_slide');
            if ($file->isValid()) {
                $file = $request->file('image_slide');
                $data['image_slide']  = $file->store('slide',['disk'=>'public']);

            }
        }

        $sliders->update($data);

        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }

        // event('settings.updated');
        return redirect()->route('sliders.index')
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
        $sliders = Slider::findOrFail($id);
        // $this->authorize('delete', $category);

        $sliders->delete();

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('sliders.index');
    }

    // public function homeSlider()
    // {

    //     $sliders = Slider::latest()->get();
    //     return view('front.home',compact('sliders'));
    // }
}
