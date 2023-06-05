<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use App\helplers\ApiFormatter;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = profile::all();

        if ($profile) {
            return ApiFormatter::createApi(200, 'success', $profile);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'tgl_lahir' => 'required',
                'no_tlpn' => 'required',
                'linkedin' => 'required',
                'instagram' => 'required',
                'facebook' => 'required',
                'twitter' => 'required',
                'image' => 'required',
            ]);

            $data = profile::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'tgl_lahir' => $request->tgl_lahir,
                'no_tlpn' => $request->no_tlpn,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'image' => $request->image,
            ]);

            $getDataSaved = profile::where('id', $data->id)->first();

            if ($getDataSaved) {
                return ApiFormatter::createApi(200, 'success', $getDataSaved);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Display the specified resource.
     */

    public function createToken()
    {
         return csrf_token();
    }

    public function show(profile $profile, $id)
    {
        try {
            $dataDetail = profile::where('id', $id)->first();

            if ($dataDetail) {
                return ApiFormatter::createApi(200, 'success', $dataDetail);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'tgl_lahir' => 'required',
                'no_tlpn' => 'required',
                'linkedin' => 'required',
                'instagram' => 'required',
                'facebook' => 'required',
                'twitter' => 'required',
                'image' => 'required',
            ]);

            $data2 = profile::findOrFail($id);

            $data2->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'tgl_lahir' => $request->tgl_lahir,
                'no_tlpn' => $request->no_tlpn,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'image' => $request->image,
            ]);

            $dataupdated = profile::where('id', $data2->id)->first();

            if ($dataupdated) {
                return ApiFormatter::createApi(200, 'success', $dataupdated);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profile $profile, $id)
    {
        try {
            $data3 = profile::findOrFail($id);
            $proses1 = $data3->delete();

            if ($proses1) {
                return ApiFormatter::createApi(200, 'success Deleted Data');
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
            
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }
}
