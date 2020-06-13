<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::all();
        return view('about_us.index', compact('about'));
    }

    public function create()
    {
        $about = new AboutUs();
        return view('about_us.create', compact('about'));
    }

    public function store(Request $request)
    {
        $about = AboutUs::create($this->validateRequest());
        $this->storeImage($about);
        return redirect('/aboutus');
    }

    public function edit(AboutUs $about)
    {
        return view('about_us.edit', compact('about'));
    }

    public function update(Request $request, AboutUs $about)
    {
        $about->update($this->validateRequest());
        $this->storeImage($about);
        return redirect('/aboutus');
    }

    public function destroy(AboutUs $about)
    {
        $about->delete();
        return redirect('/aboutus');
    }

    private function validateRequest() {
        return tap(request()->validate([
                'title' => 'required',
                'content' => 'required|max:2048',
            ]), function() {
                if(request()->hasFile('image')) {
                    request()->validate([
                        'image' => 'file|image|max:5000',
                    ]);
                }
            },
        );
    }

    private function storeImage($about) {
        if(request()->has('image')) {
            $about->update([
                'image' => request()->image->store('aboutus-img', 'public')
            ]);
        }
    }
}
