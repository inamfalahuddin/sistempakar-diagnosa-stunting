<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row my-4">
                <div class="col">
                    <h3 class="text-capitalize">Data Penyakit</h3>
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
                            Tambah Penyakit
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyakit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($items as $item) : ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td class="text-capitalize"><?= $item['nama_penyakit'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadDataForEdit('<?= $item['id'] ?>')">
                                                Edit
                                            </button> <button class="btn btn-danger btn-sm" onclick="hapusPenyakit(<?= $item['id'] ?>)">Hapus</button>
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
            <form action="<?= base_url() ?>penyakit/storagePenyakit" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Penyakit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Penyakit</label>
                        <input name="nama_penyakit" type="text" class="form-control" id="exampleFormControlInput1">
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url() ?>penyakit/editPenyakit" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gejala</h1>
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
    function hapusPenyakit(penyakitId) {
        if (confirm('Apakah Anda yakin ingin menghapus penyakit ini?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= base_url() ?>penyakit/deletePenyakit/' + penyakitId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('Penyakit berhasil dihapus.');
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat menghapus penyakit.');
                    }
                }
            };
            xhr.send();
        }
    }

    function loadDataForEdit(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?= base_url() ?>penyakit/getPenyakitById/' + id, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    var container = document.getElementById('modalBodyEdit');
                    container.innerHTML = ''; // Membersihkan konten yang sudah ada
                    container.insertAdjacentHTML('beforeend', `
                        <input type="hidden" name="id_penyakit" class="form-control" id="kodePenyakit" value="${data.id}">
                    
                        <div class="mb-3">
                            <label for="namaGejala" class="form-label">Nama Gejala</label>
                            <input name="nama_penyakit" type="text" class="form-control" id="namaPenyakit" value="${data.nama_penyakit}">
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