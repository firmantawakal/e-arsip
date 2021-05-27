<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"><?php echo $title ?></h6>
            
            <form autocomplete="off" action="<?php echo $action ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                <input type="hidden" name="f_id_suratkeluar" value="<?php echo $id_suratkeluar ?>" class="form-control">
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Surat Keluar</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_no_suratkeluar" value="<?php echo $no_suratkeluar ?>" placeholder="No. Surat Keluar" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tgl. Surat Keluar</label>
                    <div class="col-sm-9">
                        <div class="input-group date datepicker" id="datePickerExample">
                            <input type="text" name="f_tgl_suratkeluar" class="form-control" required><span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                </div>
                
                <?php if ($this->session->id_bagian == 2) { ?>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Bagian</label>
                    <div class="col-sm-9">
                        <select name="f_bagian" id="" class="form-control" required>
                            <option value="">--Pilih--</option>
                            
                            <?php foreach ($bagian as $bg) {
                                echo '<option value="'.$bg->id_bagian.'">'.$bg->nama_bagian.'</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <?php }else{ ?>
                    <input type="hidden" name="f_bagian" value="<?php echo $this->session->id_bagian ?>" class="form-control">
                <?php } ?>
                    
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tujuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_alamat_suratkeluar" value="<?php echo $alamat_suratkeluar ?>" placeholder="Tujuan Surat" required>
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