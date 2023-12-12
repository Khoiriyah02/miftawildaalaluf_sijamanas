<?php
namespace Master;
use Config\Query_builder;
class User {
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index (){
        $data = $this->db->table('user')->get()->resultArray();
        $res = ' <a href="?target=User&act=tambah_User" class="btn btn-info btn-sm">Tambah user</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                <th>No</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                        <td width="10">' . $no . '</td>
                        <td width="100">' . $r['password'] . '</td>
                        <td width="50">' . $r['nama'] . '</td>
                        <td>' . $r['nip'] . '</td>
                        <td width="150">
                            <a href="?target=User&act=edit_User&id=' . $r['password'] . '" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <a href="?target=User&act=delete_User&id=' . $r['password'] . '" class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>';
                $no++;
            }
            $res .= '</tbody></table></div>';
            return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=User" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=User&act=simpan_User" method="post">
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">nip</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }
    public function simpan()
    {
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];

        $data = array(
            'password' => $password,
            'nama' => $nama,
            'nip' => $nip
        );
        return $this->db->table('user')->insert($data);
    }
    

    public function edit($id)
    {
        $r = $this->db->table('user')->where("password='$id'")->get()->rowArray();

        $res = '<a href="?target=User" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=User&act=update_User" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['password'] . '">
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password" value="' . $r['password'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="' . $r['nip'] . '">
                        <br>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }
    public function update()
    {
        $param = $_POST['password'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];

        $data = array(
            'password' => $password,
            'nama' => $nama,
            'nip' => $nip
        );

        return $this->db->table('user')->where("password='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('user')->where("password='$id'")->delete();
    }
}