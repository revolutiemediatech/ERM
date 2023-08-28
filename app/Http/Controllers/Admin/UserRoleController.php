<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RoleModel;

class UserRoleController extends Controller
{
    
    private $views      = 'admin/role';
    private $url        = 'admin/role';
    private $title      = 'Halaman Role';
    protected $userRole;

    public function __construct()
    {
        // Di isi Construct
        $this->userRole = New RoleModel();
    }

    public function index()
    {
        $userRole = $this->userRole->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Role',
            'userRole'      => $userRole
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Role',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataUserRole = [
            'nama'      => $request->nama,
        ];
        $this->userRole->create($dataUserRole);

        return redirect("$this->url")->with('sukses', 'Role berhasil di tambahkan');
    }

    public function show($id)
    {
        $userRole       = $this->userRole->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data User role',
            'userRole'  => $userRole,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $userRole       = $this->userRole->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Role',
            'id'        => $id,
            'userRole'  => $userRole,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataUserRole = [
            'nama'      => $request->nama,
        ];
        $this->userRole->where('id', $id)->update($dataUserRole);
        // echo json_encode($dataUserRole); die;

        return redirect("$this->url")->with('sukses', 'Data Role berhasil di edit');
    }

    public function destroy($id)
    {
        $userRole       = $this->userRole->where('id', $id)->first();
        $this->userRole->destroy($id);

        return redirect("$this->url")->with('sukses', 'Data Role' . $userRole->nama . ' berhasil di hapus');
    }
}
