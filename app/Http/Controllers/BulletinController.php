<?php

namespace App\Http\Controllers;

use App\Models\BulletinModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Bulletincontroller extends Controller
{
    // Admin index view
    public function index()
    {
        $bulletins = BulletinModel::all();
        return view('ManageBulletin.Abulletinboard', compact('bulletins'));
    }

    // User index view
    public function userIndex()
    {
        $bulletins = BulletinModel::all();
        return view('ManageBulletin.Ubulletinboard', compact('bulletins'));
    }

    // Create bulletin form
    public function create()
    {
        return view('ManageBulletin.AnewBulletin');
    }

    // Store new bulletin
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi'
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('public/media');
        }

        BulletinModel::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'media_path' => $mediaPath,
        ]);

        return redirect()->route('bulletins.index')->with('success', 'Bulletin created successfully.');
    }

    // Edit bulletin form
    public function edit(BulletinModel $bulletin)
    {
        return view('ManageBulletin.AeditorBulletin', compact('bulletin'));
    }

    // Update bulletin
    public function update(Request $request, BulletinModel $bulletin)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi'
        ]);

        $mediaPath = $bulletin->media_path;
        if ($request->hasFile('media')) {
            if ($mediaPath) {
                Storage::delete($mediaPath);
            }
            $mediaPath = $request->file('media')->store('public/media');
        }

        $bulletin->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'media_path' => $mediaPath,
        ]);

        return redirect()->route('bulletins.index')->with('success', 'Bulletin updated successfully.');
    }

    // Delete bulletin
    public function destroy(BulletinModel $bulletin)
    {
        if ($bulletin->media_path) {
            Storage::delete($bulletin->media_path);
        }
        $bulletin->delete();

        return redirect()->route('bulletins.index')->with('success', 'Bulletin deleted successfully.');
    }

    // Show single bulletin for admin
    public function show(BulletinModel $bulletin)
    {
        return view('ManageBulletin.AviewerBulletin', compact('bulletin'));
    }

    // Show single bulletin for user
    public function userShow(BulletinModel $bulletin)
    {
        return view('ManageBulletin.UviewerBulletin', compact('bulletin'));
    }
}
