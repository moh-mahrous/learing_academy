<?php

namespace App\Http\Controllers\Admin;

use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data['trainers'] = Trainer::get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE );
        return view('admin.trainers.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'spec' => 'required|string|max:100',
            'img' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $new_name = $data['img']->hashName();


        Image::make($data['img'])->save(public_path('uploads/trainers/'.$new_name));

        $data['img'] = $new_name;

        Trainer::create($data);

        return(redirect(route('admin.trainers.index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        return view('admin.trainers.show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('admin.trainers.edit',compact('trainer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'spec' => 'required|string|max:100',
            'img' => 'sometimes|image|mimes:jpeg,jpg,png',
        ]);

        $old_name = $trainer->img;

        if($request->hasFile('img'))
        {
            Storage::disk('uploads')->delete('trainers/'.$old_name);

            $new_name = $data['img']->hashName();

            Image::make($data['img'])->save(public_path('uploads/trainers/'.$new_name));

            $data['img'] = $new_name;
        }
        else
        {
            $data['img'] = $old_name;
        }

        $trainer->update($data);

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $old_name = $trainer->img;

        Storage::disk('uploads')->delete('trainers/'.$old_name);

        $trainer->delete();

        return(redirect(route('admin.trainers.index')));

    }
}
