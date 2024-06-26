<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class ="p-3">Sosial Media Komunitas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="<?= base_url('admin/sosmed_add') ?>" class="btn btn-primary">Tambahkan Data</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body overflow-auto">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Pengguna</th>
                                        <th>URL Sosial Media</th>
                                        <th>Jenis Sosial Media</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sosmed as $s) {
                                    ?>
                                        <tr>
                                            <td><?= $s->nama_pengguna?></td>
                                            <td><?= $s->url ?></td>
                                            <td><?= $s->jenis_sosmed ?></td>
                                            <td><a href="<?= base_url('admin/sosmed_edit/'.$s->id_sosmed) ?>" class="btn btn-primary">Mengubah</a></td>
                                            <td>
                                                <a class="btn btn-danger" data-toggle="modal" data-target="#hapuslah<?= $s->id_sosmed ?>">Menghapus</a>
                                            </td>
                                        </tr>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapuslah<?= $s->id_sosmed ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalSayaLabel">Apakah anda yakin ingin menghapus?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="<?= base_url('admin/sosmed_hapus') ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control border-0" name="id" value="<?= $s->id_sosmed ?>">
                                                            </div>
                                                            <button name="save" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
