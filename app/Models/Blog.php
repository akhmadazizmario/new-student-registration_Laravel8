<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {

        //function search
        $query->when($filters['search'] ?? false,  function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')->orWhere('deskripsi', 'like', '%' . $search  . '%');
        });
        //end
    }
}
