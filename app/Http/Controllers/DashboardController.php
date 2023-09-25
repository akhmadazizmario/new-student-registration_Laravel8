<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Review;
use App\Models\Siswa;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahBlog = Blog::count();
        $jumlahsuratmasuk = SuratMasuk::count();
        $jumlahsuratkeluar = SuratKeluar::count();
        $jumlahPrestasi = Prestasi::count();
        $siswabaru = Siswa::latest()->take(5)->get();
        $reviewbaru = Review::take(5)->get();
        $dataChartSiswa = Siswa::all();
        $dataCounts = $dataChartSiswa->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d'); // Mengelompokkan data berdasarkan tanggal saja
        })->map->count();


        return view(
            'admin.dashboard.index',
            [
                'jumlah_guru' => $jumlahGuru,
                'jumlah_siswa' => $jumlahSiswa,
                'jumlah_blog' => $jumlahBlog,
                'jumlah_prestasi' => $jumlahPrestasi,
                'jumlah_suratmasuk' => $jumlahsuratmasuk,
                'jumlah_suratkeluar' => $jumlahsuratkeluar,
                'siswa_baru' => $siswabaru,
                'dataCounts' => $dataCounts,
                'review_baru' => $reviewbaru
            ]
        );
    }
}
