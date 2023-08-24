<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratKeluarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function collection()
    {
        // return $this->data;
        return collect($this->data)->map(function ($suratkeluar) {
            // Menggunakan strip_tags untuk menghapus tag div dari nilai atribut Trix Editor
            return [
                'id' => $suratkeluar->id,
                'no_surat' => $suratkeluar->no_surat,// Nilai atribut Trix Editor akan dibersihkan dari tag div
                'pengirim' => $suratkeluar->pengirim,
                'tujuan' => $suratkeluar->tujuan,
                'perihal' => $suratkeluar->perihal,
                'created_at' => $suratkeluar->created_at
                // Tambahkan kolom lainnya sesuai kebutuhan
            ];
        });
    }

    // Fungsi untuk menambahkan judul kolom di file Excel
    public function headings(): array
    {
        return [
            'id' ,
                'no_surat' ,
                'pengirim', 
                'tujuan',
                'perihal',
                'created_at'
            // Tambahkan judul kolom lainnya sesuai dengan data yang ingin diexport
        ];
    }

}
