<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    private $views      = 'admin/profile';
    private $url        = 'admin/profile';
    private $title      = 'Halaman Profile';
    protected $mUsers;

    public function __construct()
    {
        // Di isi Construct
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
        // echo json_encode($user); die;
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
        if (isset($request->photo)) {
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid()."-".time().".".$file->extension();
                // $file->move(public_path(). "/upload/logo_sekolah/", $fileName);
                $file->move( "upload/profile/", $fileName);
            }
            // $dataInfo = [
            //     'alamat'        => $request->alamat,
            //     'telp'          => $request->telp,
            //     'logo'          => $fileName,
            //     'email'         => $request->email,
            // ];
            $dataUser = [
                'deskripsi'         => $request->deskripsi,
                'no_hp'             => $request->no_hp,
                'no_wa'             => $request->no_wa,
                'alamat'            => $request->alamat,
                'gambar'            => $fileName,
            ];
            $this->mUsers->where('id', $request->id)->update($dataUser);
            return redirect("$this->url")->with('sukses', 'Data Profile berhasil di edit');
            // echo json_encode($dataInfo); die;
        }else{
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
}
