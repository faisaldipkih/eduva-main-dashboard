<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoKemdikbudController extends Controller
{
    public function index()
    {
        return view('info_kemdikbud');
    }

    public function store()
    {
        $res = request()->all();
        unset($res['_token']);
        $validator = Validator::make($res, [
            "judul" => 'required',
            "deskripsi" => 'required',
            "link" => 'required'
        ]);
        if (!$validator->fails()) {
            $res['datetime'] = date('Y-m-d H:i:s');
            if (request('foto') == null) {
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKey(['link' => config('constants.LINK_API') . 'api/create/infoKemdikbud', 'data' => $res, 'type' => 'POST']);
            } else {
                $data = [
                    ['name' => 'judul', 'contents' => $res['judul']],
                    ['name' => 'deskripsi', 'contents' => $res['deskripsi']],
                    ['name' => 'link', 'contents' => $res['link']],
                    ['name' => 'foto', 'contents' => fopen(request('foto')->getPathname(), 'r'), 'Mime-Type' => request('foto')->getMimeType('image'), 'filename' => request('foto')->getClientOriginalName()],
                ];
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKeyFile(['link' => config('constants.LINK_API') . 'api/create/infoKemdikbud', 'data' => $data, 'type' => 'POST']);
            }
            $responese = json_decode($req->getBody(), true);
            $status = $req->getStatusCode();
            if ($status === 200) {
                return json_encode([
                    'status' => true,
                    'message' => $responese['message'],
                    'data' => $responese
                ]);
            } else {
                return json_encode(['status' => false, 'message' => 'Invalid response from api']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Lengkapi Form']);
        }
    }

    public function update()
    {
        $res = request()->all();
        unset($res['_token']);
        $validator = Validator::make($res, [
            "judul" => 'required',
            "deskripsi" => 'required',
            "link" => 'required'
        ]);
        if (!$validator->fails()) {
            $res['datetime'] = date('Y-m-d H:i:s');
            if (request('foto') == null) {
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKey(['link' => config('constants.LINK_API') . 'api/update/infoKemdikbud/' . $res['id'], 'data' => $res, 'type' => 'PATCH']);
            } else {
                $data = [
                    ['name' => 'judul', 'contents' => $res['judul']],
                    ['name' => 'deskripsi', 'contents' => $res['deskripsi']],
                    ['name' => 'link', 'contents' => $res['link']],
                    ['name' => 'foto', 'contents' => fopen(request('foto')->getPathname(), 'r'), 'Mime-Type' => request('foto')->getMimeType('image'), 'filename' => request('foto')->getClientOriginalName()],
                ];
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKeyFile(['link' => config('constants.LINK_API') . 'api/update/infoKemdikbud/' . $res['id'], 'data' => $data, 'type' => 'PATCH']);
            }
            $responese = json_decode($req->getBody(), true);
            $status = $req->getStatusCode();
            if ($status === 200) {
                return json_encode([
                    'status' => true,
                    'message' => $responese['message'],
                    'data' => $responese
                ]);
            } else {
                return json_encode(['status' => false, 'message' => 'Invalid response from api']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Lengkapi Form']);
        }
    }
}
