<?php
namespace Master;
use Config\Query_builder;
class Datarequest {
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index (){
        $data = $this->db->table('request')->get()->resultArray();
        $res = ' <a href="?target=Datarequest&act=tambah_Datarequest" class="btn btn-info btn-sm">Tambah data request</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>alamat peminjam</th>
                    <th>no telepon</th>
                    <th>tgl mulai</th>
                    <th>fasilitas</th>
                    <th>keperluan</th>
                    <th>tgl kembali</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                        <td width="10">' . $no . '</td>
                        <td width="100">' . $r['alamat_peminjam'] . '</td>
                        <td width="50">' . $r['no_telepon'] . '</td>
                        <td>' . $r['tgl_mulai'] . '</td>
                        <td>' . $r['fasilitas'] . '</td>
                        <td>' . $r['keperluan'] . '</td>
                        <td>' . $r['tgl_kembali'] . '</td>
                        <td width="150">
                            <a href="?target=Datarequest&act=edit_Datarequest&id=' . $r['alamat_peminjam'] . '" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <a href="?target=Datarequest&act=delete_Datarequest&id=' . $r['alamat_peminjam'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=Datarequest" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=Datarequest&act=simpan_Datarequest" method="post">
                    <div class="mb-3">
                        <label for="alamat_peminjam" class="form-label">Alamat_Peminjam</label>
                        <input type="text" class="form-control" id="alamat_peminjam" name="alamat_peminjam">
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No_Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_mulai" class="form-label">tgl_mulai</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas">
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">tgl_kembali</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }
    public function simpan()
    {
        $alamat_peminjam = $_POST['alamat_peminjam'];
        $no_telepon = $_POST['no_telepon'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $fasilitas = $_POST['fasilitas'];
        $keperluan = $_POST['keperluan'];
        $tgl_kembali = $_POST['tgl_kembali'];

        $data = array(
            'alamat_peminjam' => $alamat_peminjam,
            'no_telepon' => $no_telepon,
            'tgl_mulai' => $tgl_mulai,
            'fasilitas' => $fasilitas,
            'keperluan'=> $keperluan,
            'tgl_kembali' => $tgl_kembali
        );
        return $this->db->table('request')->insert($data);
    }
    

    public function edit($id)
    {
        $r = $this->db->table('request')->where("alamat_peminjam='$id'")->get()->rowArray();

        $res = '<a href="?target=Datarequest" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=Datarequest&act=update_Datarequest" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['alamat_peminjam'] . '">
                    <div class="mb-3">
                        <label for="alamat_peminjam" class="form-label">alamat_peminjam</label>
                        <input type="text" class="form-control" id="alamat_peminjam" name="alamat_peminjam" value="' . $r['alamat_peminjam'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">no_telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="' . $r['no_telepon'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_mulai" class="form-label">tgl_mulai</label>
                        <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="' . $r['tgl_mulai'] . '">
                        <br>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="' . $r['fasilitas'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="' . $r['keperluan'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">tgl_kembali</label>
                        <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali" value="' . $r['tgl_kembali'] . '">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }
    public function update()
    {
        $param = $_POST['param'];
        $alamat_peminjam = $_POST['alamat_peminjam'];
        $no_telepon = $_POST['no_telepon'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $fasilitas = $_POST['fasilitas'];
        $keperluan = $_POST['keperluan'];
        $tgl_kembali = $_POST['tgl_kembali'];

        $data = array(
            'alamat_peminjam' => $alamat_peminjam,
            'no_telepon' => $no_telepon,
            'tgl_mulai' => $tgl_mulai,
            'fasilitas' => $fasilitas,
            'keperluan' => $keperluan,
            'tgl_kembali' => $tgl_kembali

        );

        return $this->db->table('request')->where("alamat_peminjam='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('request')->where("alamat_peminjam='$id'")->delete();
    }
}