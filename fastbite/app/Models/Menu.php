<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    protected $table = 'menu_items';
    protected $primaryKey = 'itemId';
    public $timestamps = false;
    protected $fillable = [
        'itemName',
        'itemDescription',
        'itemPrice',
        'itemImage',
    ];
}