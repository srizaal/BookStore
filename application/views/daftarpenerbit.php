<div class="card mt-2">
    <div class="card-header text-center">
        <h1 style="background-color:greenyellow; margin: 30px;">DATA PENERBIT</h1>

        <?= $this->session->flashdata('pesan'); ?>

        <button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Penerbit
        </button>

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col"><center>No</center></th>
                    <th scope="col"><center>Nama Penerbit</center></th>
                    <th scope="col"><center>Alamat Penerbit</center></th>
                    <th scope="col"><center>Aksi</center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($data_penerbit as $row) { ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $row['nama_penerbit']; ?></td>
                    <td><?= $row['alamat_penerbit']; ?></td>
                    <td>
                        <a href="<?= base_url('book/hapus_penerbit/').$row['kode_penerbit'];?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>

                        <a href="<?= base_url('book/show_edit_penerbit/').$row['kode_penerbit'];?>"
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