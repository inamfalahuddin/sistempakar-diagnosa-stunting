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
                                <th>IF</th>
                                <th>Nama Gejala</th>
                                <th>THEN</th>
                                <th>Stunting</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kode Gejala</th>
                                <th>IF</th>
                                <th>Nama Gejala</th>
                                <th>THEN</th>
                                <th>Stunting</th>
                                <th>Bobot</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data_gejala as $key => $item) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><strong>IF</strong></td>
                                    <td><?= $item['nama_gejala'] ?></td>
                                    <td><strong>THEN</strong></td>
                                    <td>Kemungkinan Stunting</td>
                                    <td><?= $item['bobot_gejala'] ?></td>
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