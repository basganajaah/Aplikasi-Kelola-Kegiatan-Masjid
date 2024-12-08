<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
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
}
