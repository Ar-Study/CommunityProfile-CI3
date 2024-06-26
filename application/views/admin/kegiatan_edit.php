<div class="content-wrapper">
    <?php foreach ($kegiatan as $k) { ?>
        <form method="post" action="<?php echo base_url() . 'admin/kegiatan_update' ?>" enctype="multipart/form-data" class="m-5">
            <h4 class="text-center">Data Kegiatan</h4>
            <div class="form-group">
                <input type="text" class="form-control border-0" name="nama" placeholder="Nama Kegiatan" value="<?php echo  $k->nama_kegiatan; ?>">
                <input type="hidden" class="form-control border-0" name="id" value="<?php echo  $k->id_kegiatan; ?>">
                <?php echo form_error('nama'); ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control border-0" name="content" placeholder="isi Kegiatan" value="<?= $k->isi_kegiatan ?>">
                <?php echo form_error('content'); ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control border-0" name="lokasi" placeholder="Lokasi Kegiatan" value="<?= $k->lokasi_kegiatan ?>">
                <?php echo form_error('lokasi'); ?>
            </div>
            <div class="form-group">
                <label for="jenis_kegiatan">Jenis Kegiatan</label>
                <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                    <option value="individu" <?php if($k->jenis_kegiatan == 'individu') { echo 'selected'; } ?>>Kegitan Individu</option>
                    <option value="kelompok" <?php if($k->jenis_kegiatan == 'kelompok') { echo 'selected'; } ?>>Kegiatan Kelompok</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_kegiatan">Tanggal Pelaksanaan Kegiatan</label>
                <input type="date" class="form-control border-0" name="tanggal_kegiatan" placeholder="Tanggal Kegiatan" value="<?= $k->tanggal_kegiatan ?>">
                <?php echo form_error('tanggal_kegiatan'); ?>
            </div>
            <div class="custom-file">
                <input type="hidden" name="foto_old" value="<?php echo $k->logo_kegiatan ?>">
                <img src="<?php echo base_url() . './img/' . $k->logo_kegiatan ?>" alt="" width="100px" class="my-3">
                <br>
                <input type="file" name="foto" value="">
                <?php echo form_error('foto'); ?>
            </div>
            <button class="btn btn-primary my-5" name="save">Simpan</button>
        </form>
    <?php } ?>
</div>
