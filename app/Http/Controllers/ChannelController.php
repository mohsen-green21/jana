<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Genre;
use App\Music;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\Cloner\Data;

class ChannelController extends Controller
{
    // channel
    public function index()
    {
        $channels = Channel::latest()->paginate(5);
        return view('channel.index', compact('channels'));

    }

    //forme list channel
    public function create()
    {

        $musics = Music::all();
        $geners = Genre::all();
        $id = 0;
        return view('channel.create', compact('musics', 'id', 'geners'));

    }
    // add channel
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|unique:channels',
            'des' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'music' => 'required',
            'data' => 'required',

        ]);

        $url = config('global.urlstorgee');
        $uuid = Str::uuid();
        $extension_file = $request->file('img')->extension();
        $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";

        $channel = new Channel();
        // تبدیل تاریخ به میلادی
        $data_persion_english = $channel->convertPersianToEnglish($request->data);
        // اعتبار سنجی تاریخ
        $validate = $channel->fnValidateDate($data_persion_english, 'index');
        if ($validate == 0) {return redirect()->back();}
        $data_Jalali = Verta::parse($data_persion_english);

        $channel_id = $channel->create(
            ['name' => $request->input('name'), 'description' => $request->input('des'), 'data' => $data_Jalali->datetime(), 'coverImage' => $url_cover_image]
        );

        foreach ($request->music as $music_id) {

            $channel_id->musics()->attach($music_id);
        }

        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');

    }
    // form edite
    public function edit($id)
    {

        $musics = Music::all();
        $channel = Channel::find($id);
        // برای لیست کردن اهنگ ها کانال در ویرایش
        $list_music = $channel->musics;

        return view('channel.edit', compact('musics', 'id', 'channel', 'list_music'));

    }
    // edite channel
    public function update(Request $request, $id)
    {

        // validata
        $validate = $request->validate([
            'name' => 'required|string|unique:channels,name,'.$id.',_id',
            'des' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'music' => 'required',
            'data' => 'required',

        ]);

        // save edite

        if ($request->img != null) {
            $url = config('global.urlstorgee');
            $uuid = Str::uuid();
            $extension_file = $request->file('img')->extension();
            $request->file('img')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";
        }

        $channel = Channel::find($request->channelid);

        // تبدیل تاریخ به میلادی
        $data_persion_english = $channel->convertPersianToEnglish($request->data);
        // اعتبار سنجی تاریخ
        $validate = $channel->fnValidateDate($data_persion_english, 'index');
        if ($validate == 0) {return redirect()->back();}
        $data_Jalali = Verta::parse($data_persion_english);

        $channel->name = $request->name;
        if ($request->img != null) {$channel->coverImage = $url_cover_image;}
        $channel->data = $data_Jalali->datetime();
        $channel->description = $request->des;
        $channel->save();

        // datach
        $list_music = $channel->musics;
        foreach ($list_music as $music_list) {

            $channel->musics()->detach($music_list->_id);
        }

        // atach
        foreach ($request->music as $music_id) {

            $channel->musics()->attach($music_id);
        }

        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ویرایش شد ‌‌');

    }

}
