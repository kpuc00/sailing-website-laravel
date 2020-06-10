<?php

namespace App\Http\Controllers;

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
        return view('announcement.create');
    }

    public  function  store()
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        \App\Announcement::create($data);

        return redirect('/announcement');
    }
}
