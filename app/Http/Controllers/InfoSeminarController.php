<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoSeminarController extends Controller
{
    public function index()
    {
        return view('info_seminar');
    }

    public function store()
    {
        $res = request()->all();
        unset($res['_token']);
        $validator = Validator::make($res, [
            "judul" => 'required',
            "deskripsi" => 'required',
            "link" => 'required',
            "reg_deadline" => 'required'
        ]);
        if (!$validator->fails()) {
            $res['reg_deadline'] = date('Y-m-d H:i', strtotime($res['reg_deadline']));
            if (request('foto') == null) {
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKey(['link' => config('constants.LINK_API') . 'api/create/infoSeminarWebinar', 'data' => $res, 'type' => 'POST']);
            } else {
                $data = [
                    ['name' => 'judul', 'contents' => $res['judul']],
                    ['name' => 'deskripsi', 'contents' => $res['deskripsi']],
                    ['name' => 'link', 'contents' => $res['link']],
                    ['name' => 'reg_deadline', 'contents' => $res['reg_deadline']],
                    ['name' => 'foto', 'contents' => fopen(request('foto')->getPathname(), 'r'), 'Mime-Type' => request('foto')->getMimeType('image'), 'filename' => request('foto')->getClientOriginalName()],
                ];
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKeyFile(['link' => config('constants.LINK_API') . 'api/create/infoSeminarWebinar', 'data' => $data, 'type' => 'POST']);
            }
            $responese = json_decode($req->getBody(), true);
            $status = $req->getStatusCode();
            if ($status === 200) {
                return json_encode([
                    'status' => true,
                    'message' => 'Data berhasil disimpan.',
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
            "link" => 'required',
            "reg_deadline" => 'required'
        ]);
        if (!$validator->fails()) {
            $res['reg_deadline'] = date('Y-m-d H:i', strtotime($res['reg_deadline']));
            if (request('foto') == null) {
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKey(['link' => config('constants.LINK_API') . 'api/update/infoSeminarWebinar/' . $res['id'], 'data' => $res, 'type' => 'PATCH']);
            } else {
                $data = [
                    ['name' => 'judul', 'contents' => $res['judul']],
                    ['name' => 'deskripsi', 'contents' => $res['deskripsi']],
                    ['name' => 'link', 'contents' => $res['link']],
                    ['name' => 'reg_deadline', 'contents' => $res['reg_deadline']],
                    ['name' => 'foto', 'contents' => fopen(request('foto')->getPathname(), 'r'), 'Mime-Type' => request('foto')->getMimeType('image'), 'filename' => request('foto')->getClientOriginalName()],
                ];
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKeyFile(['link' => config('constants.LINK_API') . 'api/update/infoSeminarWebinar/' . $res['id'], 'data' => $data, 'type' => 'PATCH']);
            }
            $responese = json_decode($req->getBody(), true);
            $status = $req->getStatusCode();
            if ($status === 200) {
                return json_encode([
                    'status' => true,
                    'message' => 'Data berhasil di update.',
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
