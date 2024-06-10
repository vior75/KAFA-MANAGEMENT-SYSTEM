<?php


namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BulletinController extends Controller
{
    public function index()
    {
        $bulletins = Bulletin::all();
        return view('bulletins.index', compact('bulletins'));
    }

    public function create()
    {
        return view('bulletins.create');
    }

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

        Bulletin::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'media_path' => $mediaPath,
        ]);

        return redirect()->route('bulletins.index')->with('success', 'Bulletin created successfully.');
    }

    public function edit(Bulletin $bulletin)
    {
        return view('bulletins.edit', compact('bulletin'));
    }

    public function update(Request $request, Bulletin $bulletin)
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

    public function destroy(Bulletin $bulletin)
    {
        if ($bulletin->media_path) {
            Storage::delete($bulletin->media_path);
        }
        $bulletin->delete();

        return redirect()->route('bulletins.index')->with('success', 'Bulletin deleted successfully.');
    }
}


