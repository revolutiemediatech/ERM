<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class ProfileController extends Controller
{
    private $views      = 'apoteker/profile';
    private $url        = 'apoteker/profile';
    private $title      = 'Halaman Profile';
    protected $mUsers;

    public function __construct()
    {
        $this->mUsers     = new UserModel();
    }

    public function index()
    {
        $user = $this->mUsers->where('id', session()->get('users_id'))->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Profile',
            'user'          => $user,
        ];
        
        return view($this->views . "/index", $data);
    }

    public function edit($id)
    {
        // Get Data
        $user = $this->mUsers->where('id', $id)->first();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Profile',
            'id'            => $id,
            'user'          => $user,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        $dataUser = [
            'deskripsi'         => $request->deskripsi,
            'no_hp'             => $request->no_hp,
            'alamat'            => $request->alamat,
        ];
        // echo json_encode($dataSiswa); die;
        $this->mUsers->where('id', $request->id)->update($dataUser);
        return redirect("$this->url")->with('sukses', 'Data Profile berhasil di edit');
    }
}
