<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratMasukExport implements FromCollection, WithHeadings
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
        return collect($this->data)->map(function ($suratmasuk) {
            // Menggunakan strip_tags untuk menghapus tag div dari nilai atribut Trix Editor
            return [
                'id' => $suratmasuk->id,
                'no_surat' => $suratmasuk->no_surat,// Nilai atribut Trix Editor akan dibersihkan dari tag div
                'pengirim' => $suratmasuk->pengirim,
                'penerima' => $suratmasuk->penerima,
                'perihal' => $suratmasuk->perihal,
                'created_at' => $suratmasuk->created_at
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
                'penerima',
                'perihal',
                'created_at'
            // Tambahkan judul kolom lainnya sesuai dengan data yang ingin diexport
        ];
    }
}
