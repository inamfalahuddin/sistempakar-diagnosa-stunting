<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row my-4">
                <div class="col">
                    <h3 class="text-capitalize">Data Terminator</h3>
                </div>
            </div>

            <!-- alert -->
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- end alert -->


            <div class="card my-4">
                <div class="card-header d-flex justify-content-between align-items-center   ">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Terminator
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Kode Terminator</th>
                                <th>Keterangan</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kode Terminator</th>
                                <th>Keterangan</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data as $item) : ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['keterangan'] ?></td>
                                    <td><?= $item['bobot'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadDataForEdit('<?= $item['id'] ?>')">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm" onclick="hapusGejala('<?= $item['id'] ?>')">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url() ?>gejala/storeGejala" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Terminator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namaGejala" class="form-label">Nama Gejala</label>
                        <input name="nama_gejala" type="text" class="form-control" id="namaGejala">
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot Gejala</label>
                        <input name="bobot_gejala" step="any" type="number" class="form-control" id="bobot">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url() ?>gejala/editGejala" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Terminator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyEdit" accordion>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<script>
    function hapusGejala(gejalaId) {
        if (confirm('Apakah Anda yakin ingin menghapus gejala ini?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= base_url() ?>gejala/deleteGejala/' + gejalaId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('gejala berhasil dihapus.');
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat menghapus gejala.');
                    }
                }
            };
            xhr.send();
        }
    }

    function loadDataForEdit(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?= base_url() ?>gejala/getGejalaById/' + id, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    var container = document.getElementById('modalBodyEdit');
                    container.innerHTML = ''; // Membersihkan konten yang sudah ada
                    container.insertAdjacentHTML('beforeend', `
                        <input type="hidden" name="id" class="form-control" id="kodeGejala" value="${data.id}">
                    
                        <div class="mb-3">
                            <label for="namaGejala" class="form-label">Nama Gejala</label>
                            <input name="nama_gejala" type="text" class="form-control" id="namaGejala" value="${data.nama_gejala}">
                        </div>

                        <div class="mb-3">
                            <label for="bobotGejala" class="form-label">Bobot Gejala</label>
                            <input name="bobot_gejala" type="number" step="any" class="form-control" id="bobotGejala" value="${data.bobot_gejala}">
                        </div>
                    `);
                } else {
                    alert('Terjadi kesalahan saat mengambil data gejala.');
                }
            }
        };
        xhr.send();
    }
</script>