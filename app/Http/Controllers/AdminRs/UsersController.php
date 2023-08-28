<?php

namespace App\Http\Controllers\AdminRs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\FaskesModel;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Untuk panggil view
    private $views      = 'adminRs/users';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'adminRs/users';
    
    // Title head
    private $title      = 'Halaman Data Karyawan';
    protected $userRole;
    protected $mUsers;
    protected $mFaskes;

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mUsers           = new UserModel();
        $this->userRole         = New RoleModel();
        $this->mFaskes         = New FaskesModel();

    }

    public function index()
    {
        $users = $this->mUsers->where('idFaskes', session()->get('idFaskes'))->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Karyawan',
            'users'         => $users,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $userRole = $this->userRole->whereRaw('id <> 1')->get();
        $faskes = $this->mFaskes->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Karyawan',
            'userRole'      => $userRole,
            'faskes'        => $faskes
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        // masuk sini hasil form create

        $dataUser = [
            'username'          => $request->username,
            'prefix'            => $request->prefix,
            'nama'              => $request->nama,
            'suffix'            => $request->suffix,
            'password'          => Hash::make($request->password),
            'sandi'             => $request->password,
            'no_hp'             => $request->no_hp,
            'no_wa'             => $request->no_wa,
            'status'            => 1,
            'idRole'            => $request->idRole,
            'idFaskes'          => session()->get('idFaskes'),
        ];
        // echo json_encode($dataUser); die;
        $this->mUsers->create($dataUser);

        return redirect("$this->url")->with('sukses', 'Data Karyawan berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
    }

    public function edit($id)
    {
        // Get Data
        $user = $this->mUsers->where('id', $id)->first();
        $userRole = $this->userRole->whereRaw('id <> 1')->get();
        // echo json_encode($user); die;
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Karyawan',
            'id'            => $id,
            'user'          => $user,
            'userRole'      => $userRole
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
       
        if ($request->password != $request->verifikasi) {
            return redirect("$this->url/$request->id/edit")->with('gagal', 'Verifikasi password harus sama dengan password');
        } else {
            $dataUser = [
                'prefix'        => $request->prefix,
                'nama'          => $request->nama,
                'suffix'        => $request->suffix,
                'idRole'        => $request->idRole,
                'username'      => $request->username,
                'password'      => Hash::make($request->password),
                'sandi'         => $request->password,
                'status'        => $request->status,
            ];
            // echo json_encode($dataSiswa); die;
            $this->mUsers->where('id', $request->id)->update($dataUser);
            return redirect("$this->url")->with('sukses', 'Data Karyawan berhasil di edit');
        }
    }

    public function destroy($id)
    {
        $users      = $this->mUsers->where('id', $id)->first();
        $this->mUsers->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Karyawan ' . $users->nama . ' berhasil di hapus');
    }
}
