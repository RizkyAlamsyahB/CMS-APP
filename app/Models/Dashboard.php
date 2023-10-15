<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    public $table = 'dashboards'; // Gantilah dengan nama tabel yang sesuai

    public function getUserCount()
    {
        // Contoh: Mengambil jumlah pengguna dari database
        return User::count();
    }

    public function getNewsCount()
    {
        // Contoh: Mengambil jumlah berita dari database
        return News::count();
    }

    public function getCategoryCount()
    {
        // Contoh: Mengambil jumlah kategori dari database
        return Category::count();
    }
}
