<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Siswa::all();
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
        return collect($this->data)->map(function ($siswas) {
            // Menggunakan strip_tags untuk menghapus tag div dari nilai atribut Trix Editor
            return [
                'id' => $siswas->id,
                'nama_lengkap' => $siswas->nama_lengkap,
                'alamat' => strip_tags($siswas->alamat), // Nilai atribut Trix Editor akan dibersihkan dari tag div
                'nik' => $siswas->nik,
                'no_hp' => $siswas->no_hp,
                'tempat_lahir' => $siswas->tempat_lahir,
                'tgl_lahir' => $siswas->tgl_lahir,
                'jenis_kelamin' => $siswas->jenis_kelamin,
                'ayah' => $siswas->ayah,
                'ibu' => $siswas->ibu,
                'pekerjaan_ayah' => $siswas->pekerjaan_ayah,
                'pekerjaan_ibu' => $siswas->pekerjaan_ibu,
                'status' => $siswas->status,
                'agama' => $siswas->agama
                // Tambahkan kolom lainnya sesuai kebutuhan
            ];
        });
    }

    // Fungsi untuk menambahkan judul kolom di file Excel
    public function headings(): array
    {
        return [
            'id' ,
                'nama_lengkap' ,
                'alamat', 
                'nik',
                'no_hp',
                'tempat_lahir',
                'tgl_lahir',
                'jenis_kelamin',
                'ayah',
                'ibu',
                'pekerjaan_ayah',
                'pekerjaan_ibu',
                'status',
                'agama',
            // Tambahkan judul kolom lainnya sesuai dengan data yang ingin diexport
        ];
    }
}
