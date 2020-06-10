<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = \App\Announcement::all();

        return view('announcement.index',compact('announcements'));
    }

    public function create()
    {
        $announcement = new Announcement();
        return view('announcement.create', compact('announcement'));
    }

    public function store(Request $request)
    {
        dd($request);
        $announcement = Announcement::create($this->validateRequest());
        $this->storeImage($announcement);
        return redirect('announcement/'.$announcement->id);
    }

    public function show(Announcement $announcement)
    {
        return view('announcement.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('announcement.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update($this->validateRequest());
        $this->storeImage($announcement);
        return redirect('announcement/'.$request->id);
    }

    private function storeImage($announcement) {
        if(request()->has('image')) {
            $announcement->update([
                'image' => request()->image->store('announcement-img', 'public')
            ]);
        }
    }

    private function validateRequest() {
        return tap(request()->validate([
            'title' => 'required|max:256',
            'content' => 'required|max:2048',
            'user_id' => 'required',
        ]), function() {
            if(request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:5000',
                ]);
            }
        }
        );
    }
}
