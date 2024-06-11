<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row my-4">
                <div class="col">
                    <h3 class="text-capitalize"><?= $title ?></h3>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="card p-2 px-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $data_user['nama']; ?></td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td><?= $data_user['umur']; ?> Tahun</td>
                                </tr>
                                <tr>
                                    <th>Hasil</th>
                                    <td><?= $data_user['hasil']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bobot CF</th>
                                    <td><?= $data_user['bobot']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="card p-2 px-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Kode Gejala</th>
                                    <?php foreach ($cf_pakar as $key => $pakar) : ?>
                                        <th><?= $pakar['kode_gejala']; ?></th>
                                    <?php endforeach ?>
                                </tr>
                                <tr>
                                    <th>CF Pakar</th>
                                    <?php foreach ($cf_pakar as $key => $pakar) : ?>
                                        <td><?= $pakar['bobot_gejala']; ?></td>
                                    <?php endforeach ?>
                                </tr>
                                <tr>
                                    <th>CF User</th>
                                    <?php foreach ($cf_user as $key => $user) : ?>
                                        <td><?= $user['bobot']; ?></td>
                                    <?php endforeach ?>
                                </tr>
                                <tr>
                                    <th>CF[H] * CF[E]</th>
                                    <?php foreach ($cf as $key => $CF) : ?>
                                        <td><?= $CF; ?></td>
                                    <?php endforeach ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="card p-2 px-3">
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                function calculate_CF($cf_old, $cf_new)
                                {
                                    return $cf_old + ($cf_new * (1 - $cf_old));
                                }

                                $CF_old = ($cf[0]);
                                ?>
                                <?php for ($i = 1; $i < count($cf); $i++) : ?>
                                    <tr>
                                        <th>CFcombine</th>
                                        <td width="70%">= CF[H,E]<?= $i - 1; ?>,<?= $i; ?></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td width="70%">= CF[H,E]<?= $i - 1; ?> + CF[H,E]<?= $i; ?> * (1-CF[H,E]<?= $i - 1; ?>)</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td width="70%">= <?= $CF_old; ?> + <?= $cf[$i]; ?> * (1- <?= $CF_old; ?>)</td>
                                    </tr>
                                    <?php
                                    $CF_old = calculate_CF($CF_old, floatval($cf[$i]));
                                    ?>
                                    <tr>
                                        <th></th>
                                        <td width="70%">= <?= $CF_old; ?></td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
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