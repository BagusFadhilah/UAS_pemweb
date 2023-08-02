<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Komik;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index($id)
    {
        $komik = Komik::findOrFail($id);
        $chapters = $komik->chapters;

        return view('chapter.index', compact('komik', 'chapters'));
    }

    public function show($komik_id, $chapter_id)
    {
        $chapter = Chapter::findOrFail($chapter_id);

        return view('chapter.show', compact('chapter'));
    }
    // Fungsi untuk menampilkan halaman tambah chapter
    public function create($komik_id)
    {
        $komik = Komik::findOrFail($komik_id);
        return view('admin.chapter.create', compact('komik'));
    }

    // Fungsi untuk menyimpan data chapter yang baru ditambahkan
    public function store(Request $request, $komik_id)
    {
        $request->validate([
            'title' => 'required',
            'chapter_number' => 'required|integer',
            'content' => 'nullable',
            'page_count' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'chapter_number', 'content', 'page_count']);

        $komik = Komik::findOrFail($komik_id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('chapter_images', 'public');
            $data['image'] = $imagePath;
        }

        $chapter = $komik->chapters()->create($data);

        return redirect()->route('admin.komik.edit', ['id' => $komik->id])->with('success', 'Chapter added successfully');
    }

    // Fungsi untuk menampilkan halaman edit chapter
    public function edit($id)
    {
        $chapter = Chapter::findOrFail($id);
        return view('admin.chapter.edit', compact('chapter'));
    }

    // Fungsi untuk menyimpan perubahan data chapter
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'chapter_number' => 'required|integer',
            'content' => 'nullable',
            'page_count' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'chapter_number', 'content', 'page_count']);

        $chapter = Chapter::findOrFail($id);
        $chapter->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Chapter updated successfully');
    }

    // Fungsi untuk menghapus data chapter
    public function destroy($komik_id, $chapter_id)
    {
        $chapter = Chapter::where('komik_id', $komik_id)->findOrFail($chapter_id);
        Storage::disk('public')->delete($chapter->image);
        $chapter->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Chapter deleted successfully');
    }

    public function storeImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $chapter = Chapter::findOrFail($id);

        $imagePath = $request->file('image')->store('chapter_images', 'public');

        $chapterImage = new ChapterImage([
            'image_path' => $imagePath,
        ]);

        $chapter->chapterImages()->save($chapterImage);

        return redirect()->route('chapter.show', ['komik_id' => $chapter->komik_id, 'chapter_id' => $chapter->id])
            ->with('success', 'Chapter image added successfully');
    }
}
