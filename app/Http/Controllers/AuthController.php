<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;
use Mews\Captcha\Facades\Captcha;

use App\Models\UserModel;
use App\Models\FaskesModel;

class AuthController extends Controller
{
    private $views      = 'auth';
    private $url        = '';
    private $title      = 'Halaman Login';
    protected $mUser;
    protected $mFaskes;

    public function __construct()
    {
        $this->mUser     = new UserModel();
        $this->mFaskes         = new FaskesModel();
    }

    //LOGIN
    public function login()
    {
        $faskes = $this->mFaskes->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'faskes'        => $faskes
        ];
        // View
        return view($this->views . "/index", $data);
    }

    //proses
    public function loginProses(Request $request)
    {
        // Validate
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha'  => 'required',
        ]);

        // Verify CAPTCHA
        if (!Captcha::check($request->captcha)) {
            return redirect()->back()->with('gagal', 'Invalid CAPTCHA');
        }

        // Get Data
        $users = $this->mUser->where('username', $request->username)->first();

        // Check User
        if ($users == null) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Ditemukan');
        }
        // Check faskes
        if ($request->idFaskes == null) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Ditemukan');
        }
        // Check User Password
        if (Hash::check($request->password, $users->password) == false) {
            return redirect()->back()->with('gagal', 'Kata Sandi Salah');
        }
        // Table user and Update Last Login
        $dataUser = [
            'last_login' => date('Y-m-d H:i:s'),
        ];
        $this->mUser->where('id', $users->id)->update($dataUser);
        // echo json_encode($users); die;
        // Create Session

        if ($users->idRole == 1) {
            // Admin
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'gambar'    => $users->gambar,
                'isLogin'   => true,
            ];

            session($session);
            return redirect('admin/home')->with('sukses', 'Berhasil Login sebagai Super Admin');
        } else if ($users->idRole == 2) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'isLogin'   => true,
                'idFaskes'  => $users->idFaskes,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('adminRs/home')->with('sukses', 'Berhasil Login sebagai Admin Mitra Faskes');
        } else if ($users->idRole == 3) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'idFaskes'  => $users->idFaskes,
                'isLogin'   => true,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('dokter/profile')->with('sukses', 'Berhasil Login sebagai Dokter');
        } else if ($users->idRole == 4) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'idFaskes'  => $users->idFaskes,
                'isLogin'   => true,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('apoteker/profile')->with('sukses', 'Berhasil Login sebagai Apoteker');
        } else if ($users->idRole == 5) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'idFaskes'  => $users->idFaskes,
                'isLogin'   => true,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('perawat/profile')->with('sukses', 'Berhasil Login sebagai Perawat');
        } else if ($users->idRole == 6) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'idFaskes'  => $users->idFaskes,
                'isLogin'   => true,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('bidan/profile')->with('sukses', 'Berhasil Login sebagai Bidan');
        } else if ($users->idRole == 7) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'idFaskes'  => $users->idFaskes,
                'isLogin'   => true,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('analisLabor/profile')->with('sukses', 'Berhasil Login sebagai Analis Labor');
        } else if ($users->idRole == 8) {
            // Admin Sampah
            $session = [
                'users_id'  => $users->id,
                'nama'      => $users->nama,
                'username'  => $users->username,
                'idRole'    => $users->idRole,
                'idFaskes'  => $users->idFaskes,
                'isLogin'   => true,
                'gambar'    => $users->gambar,
            ];

            session($session);
            return redirect('paramedis/profile')->with('sukses', 'Berhasil Login sebagai Paramedis');
        }
        // Response
    }

    public function registerPaksa()
    {
        $dataAdmin = [
            'username'      => 'admin@gmail.com',
            'nama'          => 'Admin',
            'password'      => Hash::make('katasandi'),
            'sandi'         => 'katasandi',
            'idRole'        => 1,
            'idFaskes'      => 1,
            'status'        => 1,
        ];
        $users = $this->mUser->create($dataAdmin);
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
