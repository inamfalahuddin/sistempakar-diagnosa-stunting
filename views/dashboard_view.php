    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col">
                        <div class="card my-4 text-center">
                            <div class="card-body">
                                <h1 class="text-capitalize">Selamat Datang di sistem pakar diagnosa <br /> stunting pada balita</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($data_counter as $item) : ?>
                        <div class="col col-lg-4 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5><?= $item['title'] ?></h5>
                                    <h3><?= $item['count'] ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
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