<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-20 21:09:51
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-30 17:21:10
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function parent_category($parent_id)
    {
        $category = Category::find($parent_id);
        return $category;
    }
}
