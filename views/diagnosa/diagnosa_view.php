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
                        DataTable Diagnosa
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('diagnosa/create'); ?>" method="post">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputFullName">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="inputFullName" name="full_name" value="<?= set_value('full_name'); ?>">
                                    <?= form_error('full_name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jenisKelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenisKelamin" name="gender">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" <?= set_value('gender') == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= set_value('gender') == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                    <?= form_error('gender', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputUmur">Umur</label>
                                    <input type="number" class="form-control" id="inputUmur" name="age" value="<?= set_value('age'); ?>">
                                    <?= form_error('age', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <table id="" class="w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gejala yang dialami (keluhan)</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_gejala as $key => $item) : ?>
                                    <tr>
                                        <td class="py-2 pe-4 <?= $key % 2 == 0 ? 'bg-light' : '' ?>"><?= $key + 1 ?></td>
                                        <td class="py-2 w-50 <?= $key % 2 == 0 ? 'bg-light' : '' ?>"><?= $item['nama_gejala'] ?></td>
                                        <td class="py-2 <?= $key % 2 == 0 ? 'bg-light' : '' ?>">
                                            <?php foreach ($data_probabilitas as $term) : ?>
                                                <input type="radio" name="<?= $item['kode_gejala'] ?>" id="<?= $term['id']; ?>-<?= $key ?>" value="<?= $term['bobot']; ?>" <?php echo set_radio($item['kode_gejala'], $term['bobot']); ?>>
                                                <label class="me-3" for="<?= $term['id']; ?>-<?= $key ?>"><?= $term['keterangan']; ?></label>
                                            <?php endforeach ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="py-2 pt-4 text-end" colspan="3">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
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