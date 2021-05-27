<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"><?php echo $title ?></h6>
            
            <form autocomplete="on" action="<?php echo $action ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                <input type="hidden" name="f_id_suratmasuk" value="<?php echo $id_suratmasuk ?>" class="form-control">
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Surat Masuk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_no_suratmasuk" value="<?php echo $no_suratmasuk ?>" placeholder="No. Surat Masuk" required>
                    </div>
                </div>
                    
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tgl. Surat Masuk</label>
                    <div class="col-sm-9">
                        <div class="input-group date datepicker" id="datePickerExample">
                            <input type="text" name="f_tgl_suratmasuk" class="form-control" required><span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Instansi Pengirim</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_instansi_pengirim" value="<?php echo $instansi_pengirim ?>" placeholder="Instansi Pengirim" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Isi Singkat</label>
                    <div class="col-sm-9">
                        <textarea name="f_isi_singkat" id="" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jenis</label>
                    <div class="col-sm-9">
                        <select name="f_jenis" id="" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($jenis as $jns) {
                                echo '<option value="'.$jns->id_jenis.'">'.$jns->nama_jenis.'</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Scan File</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="f_scanFile" accept=".pdf,.png,.jpg,.jpeg" required>
                        <small>Type file yang diperbolehkan jpg, png, dan pdf dengan ukuran maks 10 MB</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="javascript:history.go(-1)" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>