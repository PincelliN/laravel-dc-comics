<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use App\Functions\Helper;
use Illuminate\Support\Str;


class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics=config('comics');
        foreach($comics as $comic){
            $new_comic=new Comic();
            $new_comic->title=$comic['title'];
            $new_comic->slug=Helper::generateSlug($new_comic->title,Comic::class);
            $new_comic->description=$comic['description'];
            $new_comic->thumb=$comic['thumb'];
            $new_comic->price=$comic['price'];
            $new_comic->series=$comic['series'];
            $new_comic->sale_date=$comic['sale_date'];
            $new_comic->type=$comic['type'];
            /* dump($new_comic); */
            $new_comic->save();
        }
    }
}
