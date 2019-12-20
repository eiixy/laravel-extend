<?php

namespace App\Http\Controllers;

use App\Models\TestJson;
use Illuminate\Http\Request;

class TestJsonController extends Controller
{
    //
    public function add()
    {
        \App\Models\TestJson::query()->create([
            'name' => '的时刻',
            'options' => [
                'aaa' => now()->toDateTimeString(),
                'bbb' => [
                    'dwqdwqdwq' => [
                        'aa' => 'dwqdwq1',
                        'bb' => 'dwqdwqdwq'
                    ]
                ]
            ]
        ]);
    }

    public function where()
    {
        \App\Models\TestJson::query()->select('options->bbb')->where('id',16)->get()->toArray();
        App\Models\TestJson::query()->select()->where('id',16)->update(['options->bbb'=>[
            'q' => 'query',
            's' => 'search'
        ]]);
        \App\Models\TestJson::query()->selectRaw('id,name,json_unquote(json_extract(`options`, \'$."date"\')) as options_date')->get()->toArray();
        $users = \App\Models\TestJson::query()->whereBetween('options->date', ['2019-12-20 10:28:50', '2019-12-20 10:29:00'])->toSql();
    }
}
