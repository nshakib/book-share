<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 10:24:56
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-09-03 09:17:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);//one to one relationship// category_id->inside to book table->belongTo
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
