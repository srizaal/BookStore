<div class="card mt-2">
    <div class="card-header text-center">

        <h1 style="margin: 30px;">DATA DAFTAR BUKU</h1>

        <!-- Menampilkan flash data -->
        <?= $this->session->flashdata('pesan'); ?>

        <!-- tombol tambah -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Buku
        </button>

        <table class="table table-success table-striped-columns" id="myTable">
            <thead>

                <tr>
                    <center>
                        <th scope="col"><center>No</center></th>
                        <th scope="col"><center>Judul Buku</center></th>
                        <th scope="col"><center>Tahun Terbit</center></th>
                        <th scope="col"><center>Kode Penerbit</center></th>
                        <th scope="col"><center>Aksi</center></th>
                    </center>

                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($data_buku as $row) { ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $row['judul_buku']; ?></td>
                    <td><?= $row['tahun_terbit']; ?></td>
                    <td><?= $row['nama_penerbit']; ?></td>
                    <td>
                        <a href="<?= base_url('book/hapus_buku/').$row['kode_buku'];?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus data ini?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>

                        <a href="<?= base_url('book/show_edit_buku/').$row['kode_buku'];?>"
                            class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>