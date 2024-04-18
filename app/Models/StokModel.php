<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;

    protected $table = 't_stok';
    protected $primaryKey = 'stok_id';

    // @var array
    protected $fillable = ['barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah'];
    // protected $fillable = ['level_id', 'username', 'nama'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(m_user::class, 'user_id', 'user_id');
    }
}