<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {   
        $kegiatan = Kegiatan::with('kategori', 'tags')->get();

        return view('pages.list-kegiatan', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'ifMultiple' => 'nullable|file|mimes:jpg,jpeg,png',
            'materi' => 'nullable|array',
            'materi.*' => 'file|mimes:pdf,doc,docx',
            'activity_name' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'category_id' => 'required|exists:kategori,category_id',
            'sel2Category' => 'nullable|array',
            'sel2Category.*' => 'nullable|exists:tag,tag_id',
            'datetime_started' => 'required|date|before:datetime_finished',
            'datetime_finished' => 'required|date|after:datetime_started',
            'max_participant' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $tags = $request->input('sel2Category', []);

        // Simpan Data Kegiatan
        $kegiatan = new Kegiatan();
        $kegiatan->thumbnail = $request->file('ifMultiple') 
            ? $request->file('ifMultiple')->store('thumbnails', 'public') 
            : null;

        // Simpan file materi jika ada
        if ($request->has('materi')) {
            $materiPaths = [];
            foreach ($request->file('materi') as $materiFile) {
                $materiPaths[] = $materiFile->store('materi', 'public'); // Simpan tiap materi
            }
            $kegiatan->materi = json_encode($materiPaths); // Simpan array file paths sebagai JSON
        }

        // Simpan data lainnya
        $kegiatan->id = $validated['user_id'];
        $kegiatan->activity_name = $validated['activity_name'];
        $kegiatan->penyelenggara = $validated['penyelenggara'];
        $kegiatan->category_id = $validated['category_id'];
        $kegiatan->datetime_started = $validated['datetime_started'];
        $kegiatan->datetime_finished = $validated['datetime_finished'];
        $kegiatan->max_participant = $validated['max_participant'];
        $kegiatan->location = $validated['location'];
        $kegiatan->description = $validated['description'];

        $kegiatan->save(); // Simpan kegiatan dan dapatkan ID kegiatan yang baru

        $activity_id = $kegiatan->id    ;

        // Simpan Tags jika ada
        if ($request->has('sel2Category')) {
            $kegiatan->tags()->sync($validated['sel2Category']);
        }

        return redirect()->route('list-kegiatan')->with('success', 'Kegiatan berhasil dibuat.');
    }
}


