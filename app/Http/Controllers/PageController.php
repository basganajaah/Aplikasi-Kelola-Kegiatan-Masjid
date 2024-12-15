<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function dashboardKegiatan()
    {
        return view ('pages.dashboard-kegiatan');
    }

    public function createKegiatan()
    {
        return view ('pages.create-kegiatan');
    }

    public function listKegiatan()
    {
        return view ('pages.list-kegiatan');
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
