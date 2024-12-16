<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Kategori;
use App\Models\Kegiatan;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function dashboardKegiatan()
    {
        return view ('pages.dashboard-kegiatan');
    }

    public function createKegiatan()
    {
        $categories = Kategori::all();
        $tags = Tag::all();

        return view ('pages.create-kegiatan', compact('categories', 'tags'));
    }

    public function listKegiatan()
    {
        $kegiatans = Kegiatan::all();
        return view ('pages.list-kegiatan', compact('kegiatans'));
    }

    public function kelolaPengguna()
    {
        return view ('pages.admin.kelola-pengguna');
    }

    public function calendar()
    {
        return view ('pages.calendar');
    }

    public function detailKegiatan()
    {
        return view ('pages.detail-kegiatan');
    }

    public function evaluasi()
    {
        return view ('pages.evaluation');
    }
}
