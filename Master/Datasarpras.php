<?php
namespace Master;
use Config\Query_builder;
class DataSarpras {
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index (){
        $data = $this->db->table('data_sarpras')->get()->resultArray();
        $res = ' <a href="?target=data_sarpras&act=tambah_data_sarpras" class="btn btn-info btn-sm">Tambah Sarpras</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                <th>No</th>
                    <th>Sarpras</th>
                    <th>Kode</th>
                    <th>Jumlah</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                        <td width="10">' . $no . '</td>
                        <td width="100">' . $r['Sarpras'] . '</td>
                        <td width="50">' . $r['kode'] . '</td>
                        <td>' . $r['Jumlah'] . '</td>
                        <td width="150">
                            <a href="?target=data_sarpras&act=edit_data_sarpras&id=' . $r['Sarpras'] . '" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <a href="?target=data_sarpras&act=delete_data_sarpras&id=' . $r['Sarpras'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=data_sarpras" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=data_sarpras&act=simpan_data_sarpras" method="post">
                    <div class="mb-3">
                        <label for="Sarpras" class="form-label">Sarpras</label>
                        <input type="text" class="form-control" id="Sarpras" name="Sarpras">
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode">
                    </div>
                    <div class="mb-3">
                        <label for="Jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="Jumlah" name="Jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }
    public function simpan()
    {
        $Sarpras = $_POST['Sarpras'];
        $kode = $_POST['kode'];
        $jumlah = $_POST['Jumlah'];

        $data = array(
            'Sarpras' => $Sarpras,
            'kode' => $kode,
            'jumlah' => $jumlah
        );
        return $this->db->table('data_sarpras')->insert($data);
    }
    

    public function edit($id)
    {
        $r = $this->db->table('data_sarpras')->where("Sarpras='$id'")->get()->rowArray();

        $res = '<a href="?target=data_sarpras" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=data_sarpras&act=update_data_sarpras" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['Sarpras'] . '">
                    <div class="mb-3">
                        <label for="Sarpras" class="form-label">Sarpras</label>
                        <input type="text" class="form-control" id="Sarpras" name="Sarpras" value="' . $r['Sarpras'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="' . $r['kode'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="Jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="Jumlah" name="Jumlah" value="' . $r['Jumlah'] . '">
                        <br>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }
    public function update()
    {
        $param = $_POST['param'];
        $Sarpras = $_POST['Sarpras'];
        $kode = $_POST['kode'];
        $Jumlah = $_POST['Jumlah'];

        $data = array(
            'Sarpras' => $Sarpras,
            'kode' => $kode,
            'Jumlah' => $Jumlah
        );

        return $this->db->table('data_sarpras')->where("Sarpras='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('data_sarpras')->where("Sarpras='$id'")->delete();
    }
}