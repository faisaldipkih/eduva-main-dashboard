<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoScholarshipController extends Controller
{
    public function index()
    {
        return view('info_scholarship');
    }

    public function store()
    {
        $res = request()->all();
        unset($res['_token']);
        $validator = Validator::make($res, [
            "tittle" => 'required',
            "description" => 'required',
            "expired_time" => 'required'
        ]);
        if (!$validator->fails()) {
            $res['expired_time'] = date('Y-m-d H:i:s', strtotime($res['expired_time']));
            if (request('banner') != null) {
                $data = [
                    ['name' => 'tittle', 'contents' => $res['tittle']],
                    ['name' => 'description', 'contents' => $res['description']],
                    ['name' => 'expired_time', 'contents' => $res['expired_time']],
                    ['name' => 'banner', 'contents' => fopen(request('banner')->getPathname(), 'r'), 'Mime-Type' => request('banner')->getMimeType('image'), 'filename' => request('banner')->getClientOriginalName()],
                ];
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKeyFile(['link' => config('constants.LINK_API') . 'api/create/infoScholarship', 'data' => $data, 'type' => 'POST']);
                $responese = json_decode($req->getBody(), true);
                $status = $req->getStatusCode();
                if ($status === 200) {
                    return json_encode([
                        'status' => true,
                        'message' => 'Info scholarship berhasil ditambah.',
                        'data' => $responese
                    ]);
                } else {
                    return json_encode(['status' => false, 'message' => 'Invalid response from api']);
                }
            } else {
                return json_encode(['status' => false, 'message' => 'Masukan banner']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Lengkapi form']);
        }
    }

    public function update()
    {
        $res = request()->all();
        unset($res['_token']);
        $validator = Validator::make($res, [
            "tittle" => 'required',
            "description" => 'required',
            "expired_time" => 'required'
        ]);
        if (!$validator->fails()) {
            $res['expired_time'] = date('Y-m-d H:i:s', strtotime($res['expired_time']));
            if (request('banner') == null) {
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKey(['link' => config('constants.LINK_API') . 'api/update/infoScholarship/' . $res['id'], 'data' => $res, 'type' => 'PATCH']);
            } else {
                $data = [
                    ['name' => 'tittle', 'contents' => $res['tittle']],
                    ['name' => 'description', 'contents' => $res['description']],
                    ['name' => 'expired_time', 'contents' => $res['expired_time']],
                    ['name' => 'banner', 'contents' => fopen(request('banner')->getPathname(), 'r'), 'Mime-Type' => request('banner')->getMimeType('image'), 'filename' => request('banner')->getClientOriginalName()],
                ];
                $req = app('App\Http\Controllers\Api\ApiInitialController')->postNoKeyFile(['link' => config('constants.LINK_API') . 'api/update/infoScholarship/' . $res['id'], 'data' => $data, 'type' => 'PATCH']);
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
            return json_encode(['status' => false, 'message' => 'Lengkapi form']);
        }
    }
}
