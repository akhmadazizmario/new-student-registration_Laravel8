<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Guru::all();
    // }


    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // Fungsi untuk mengambil data guru dari model Guru
    public function collection()
    {
        // return $this->data;
        return collect($this->data)->map(function ($guru) {
            // Menggunakan strip_tags untuk menghapus tag div dari nilai atribut Trix Editor
            return [
                'id' => $guru->id,
                'nama_lengkap' => $guru->nama_lengkap,
                'alamat' => strip_tags($guru->alamat), // Nilai atribut Trix Editor akan dibersihkan dari tag div
                'email' => $guru->email,
                'nik' => $guru->nik,
                'no_hp' => $guru->no_hp,
                'jenjang' => $guru->jenjang,
                // Tambahkan kolom lainnya sesuai kebutuhan
            ];
        });
    }

    // Fungsi untuk menambahkan judul kolom di file Excel
    public function headings(): array
    {
        return [
            'id',
            'nama_lengkap',
            'alamat',
            'email',
            'nik',
            'no_hp',
            'jenjang'
            // Tambahkan judul kolom lainnya sesuai dengan data yang ingin diexport
        ];
    }
}
