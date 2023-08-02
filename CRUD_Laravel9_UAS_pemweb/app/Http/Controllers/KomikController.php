<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Komik;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;

class KomikController extends Controller
{
    public function index()
    {
        $komiks = Komik::all();

        return view('komik.index', compact('komiks'));
    }

    public function show($id)
    {
        $komik = Komik::findOrFail($id);
        $chapters = $komik->chapters()->orderBy('chapter_number')->get();
        return view('komik.show', compact('komik', 'chapters'));
    }

    // Fungsi untuk menampilkan halaman admin dashboard
    public function adminDashboard()
    {
        $komiks = Komik::all();
        return view('admin.dashboard', compact('komiks'));
    }

    // Fungsi untuk menampilkan halaman tambah komik
    public function create()
    {
        return view('/admin/komik/create');
    }


    // Fungsi untuk menyimpan data komik yang baru ditambahkan
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'chapter_title' => 'required',
            'chapter_content' => 'nullable',
            'chapter_page_count' => 'required|integer|min:1',
            'chapter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $komikData = $request->only(['title', 'description']);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('komik_covers', 'public');
            $komikData['cover_image'] = $imagePath;
        }

        $komik = Komik::create($komikData);

        $chapterData = $request->only(['chapter_title', 'chapter_content', 'chapter_page_count']);

        if ($request->hasFile('chapter_image')) {
            $imagePath = $request->file('chapter_image')->store('chapter_images', 'public');
            $chapterData['image'] = $imagePath;
        }

        $komik->chapters()->create($chapterData);

        return redirect()->route('admin.dashboard')->with('success', 'Komik and Chapter added successfully');
    }

    // Fungsi untuk menampilkan halaman edit komik
    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        return view('admin.komik.edit', compact('komik'));
    }

    // Fungsi untuk menyimpan perubahan data komik
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        $komik = Komik::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($komik->cover_image);

            $imagePath = $request->file('cover_image')->store('komik_covers', 'public');
            $data['cover_image'] = $imagePath;
        }

        $komik->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Komik updated successfully');
    }

    // Fungsi untuk menghapus data komik
    public function destroy($id)
    {
        $komik = Komik::findOrFail($id);
        Storage::disk('public')->delete($komik->cover_image);
        $komik->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Komik deleted successfully');
    }

    public function createChapter($komik_id)
    {
        $komik = Komik::findOrFail($komik_id);
        return view('admin.chapter.create', compact('komik'));
    }

    public function storeChapter(Request $request, $komik_id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'chapter_number' => 'required|integer',
            'page_count' => 'required|integer',
        ]);

        $data = $request->only(['title', 'content', 'chapter_number', 'page_count']);
        $data['komik_id'] = $komik_id;

        Chapter::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Chapter added successfully');
    }
}
