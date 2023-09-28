<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category,$image,$imageName,$imageUrl,$directory;
    public static function NewCategory($request)
    {
        self::$image      = $request->file('image');
        self::$imageName  =self::$image->getClientOriginalName();
        self::$directory ='uploads/category-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl =self::$directory.self::$imageName;

        self::$category =new Category();
        self::$category->name        =$request->name;
        self::$category->description =$request->description;
        self::$category->image       =self::$directory.self::$imageName;
        self::$category->status      =$request->status;
        self::$category->save();
    }
    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$image        = $request->file('image');
            self::$imageName    = self::$image->getClientOriginalName();
            self::$directory    = 'uploads/category-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$category->image  = self::$directory.self::$imageName;
        }
        self::$category->name           = $request->name;
        self::$category->description    = $request->description;
        self::$category->status         = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
