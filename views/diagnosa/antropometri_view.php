<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row my-4">
                <div class="col">
                    <h3 class="text-capitalize"><?= $title ?></h3>
                </div>
            </div>

            <div class="card my-4">
                <div class="card-header d-flex justify-content-between align-items-center   ">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Hasil</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Hasil</th>
                                <th>Bobot</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data_lists as $key => $item) : ?>
                                <tr>
                                    <th><?= $key + 1; ?></th>
                                    <th><a href="<?= base_url('antropometri/detail/' . $item['id']); ?>" style="text-decoration: none;"><strong><?= $item['id']; ?></strong></a></th>
                                    <th><?= $item['nama']; ?></th>
                                    <th><?= $item['jenis_kelamin']; ?></th>
                                    <th><?= $item['umur']; ?></th>
                                    <th><?= $item['hasil']; ?></th>
                                    <th><?= $item['bobot']; ?></th>
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

<script>
    $(document).ready(function() {
        alert('oke lah')
        $('#datatablesSimple').DataTable();
    });
</script>