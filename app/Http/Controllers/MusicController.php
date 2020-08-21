<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Channel;
use App\Genre;
use App\Music;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MusicController extends Controller
{

// list music
    public function index()
    {

        $musics = Music::latest()->paginate(5);
        return view('music.index', compact('musics'));
    }

    public function create()
    {
        $artists = Artist::all();
        $genres = Genre::all();
        $albums = Album::all();
        return view('music.create', compact('artists', 'genres', 'albums'));
    }

    // music add
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'data' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'music' => 'required',
            'genre' => 'required',
            'album' => 'required',
            'artist' => 'required',
        ]);

        //mp3 اعتبار سنجی موزیک
        $validate_music = new Music();
        $music_file = $request->music;
        if (!$validate_music->validate_music($music_file)) {
            return redirect()->back()->withErrors(" موزیک باید از نوع mp3 باشد");
        }

        $url = config('global.urlstorgee');
        // اضافه کردن عکس
        $uuid = Str::uuid();
        $extension_file = $request->file('img')->extension();
        $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";

        // اضافه کردن اهنگ
        $uuid_music = Str::uuid();
        $extension_file_music = $request->file('music')->extension();
        $request->file('music')->storeAs($url . '/' . 'sounds', $uuid_music . '.' . $extension_file_music, 's3');
        $url_music = "/sounds/$uuid_music.$extension_file_music";

        $channel = new Channel();
        // تبدیل تاریخ به میلادی
        $data_persion_english = $channel->convertPersianToEnglish($request->data);
        // اعتبار سنجی تاریخ
        $validate = $channel->fnValidateDate($data_persion_english, 'index');
        if ($validate == 0) {return redirect()->back();}
        $data_Jalali = Verta::parse($data_persion_english);

        $music = new Music(['name' => $request->name, 'color' => $request->color, 'releasedata' => $data_Jalali->datetime(), 'coverImage' => $url_cover_image, 'audioLink' => $url_music, 'likes' => 0, 'views' => 0]);
        $genre = Genre::find($request->genre);
        $album = Album::find($request->album);
        $artist = Artist::find($request->artist);
        $artist->musics()->save($music);
        $genre->musics()->save($music);
        $album->musics()->save($music);
        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');

    }

    // music form edite
    public function edit($id)
    {
        $edite = true;
        $music = Music::find($id);
        $artists = Artist::all();
        $genres = Genre::all();
        $albums = Album::all();

        return view('music.edit', compact('music', 'artists', 'genres', 'albums', 'edite'));
    }

    //music edite
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'data' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'required',
            'album' => 'required',
            'artist' => 'required',

        ]);

        //mp3 اعتبار سنجی موزیک
        if ($request->musicfile != null) {
            $validate_music = new Music();
            $music_file = $request->musicfile;
            if (!$validate_music->validate_music($music_file)) {
                return redirect()->back()->withErrors(" موزیک باید از نوع mp3 باشد");
            }}

        // گرفتن ایدی های رابطه برای ویرایش
        $music_id = $request->music_id;
        $music = Music::find($music_id);
        $artists = $music->artists;
        $genres = $music->genres;
        $albums = $music->albums;

        $url = config('global.urlstorgee');
        // اضافه کردن عکس
        if ($request->img != null) {
            $uuid = Str::uuid();
            $extension_file = $request->file('img')->extension();
            $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";
        }
        // اضافه کردن اهنگ
        if ($request->musicfile != null) {
            $uuid_music = Str::uuid();
            $extension_file_music = $request->file('musicfile')->extension();
            $request->file('musicfile')->storeAs($url . '/' . 'sounds', $uuid_music . '.' . $extension_file_music, 's3');
            $url_music = "/sounds/$uuid_music.$extension_file_music";}

        $channel = new Channel();
        // تبدیل تاریخ به میلادی
        $data_persion_english = $channel->convertPersianToEnglish($request->data);
        // اعتبار سنجی تاریخ
        $validate = $channel->fnValidateDate($data_persion_english, 'index');
        if ($validate == 0) {return redirect()->back();}
        $data_Jalali = Verta::parse($data_persion_english);

        $music->name = $request->name;
        $music->releasedata = $data_Jalali->datetime();
        if ($request->img != null) {$music->coverImage = $url_cover_image;}
        $music->color = $request->color;
        if ($request->musicfile != null) {$music->audioLink = $url_music;}
        $music->save();

// detche

        foreach ($artists as $artist) {
            $music->artists()->detach($artist->_id);
        }
        foreach ($genres as $genre) {
            $music->genres()->detach($genre->_id);

        }
        foreach ($albums as $album) {
            $music->albums()->detach($album->_id);

        }
// atach
        $music->artists()->attach($request->artist);
        $music->genres()->attach($request->genre);
        $music->albums()->attach($request->album);

        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ویرایش شد‌‌');

    }
}
