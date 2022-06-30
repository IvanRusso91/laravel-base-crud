<?php
use App\Comic;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;
use Faker\Generator as Faker;
class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $comics= config('comics');

        foreach($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->title = $comic->title;
            $new_comic->slug = Str::slug($comic->title, '-');
            $new_comic->image= $comic-> image;
            $new_comic->type= $comic->type;
            $new_comic->description= $faker->paragraph();

            $new_comic->save();
        }

    }
}
