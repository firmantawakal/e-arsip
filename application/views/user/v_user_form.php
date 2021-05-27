<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"><?php echo $title ?></h6>
            <form autocomplete="off" action="<?php echo $action ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                <input type="hidden" name="f_username_hid" value="<?php echo $username_hid ?>" class="form-control">
                
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama User</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_nama_user" value="<?php echo $nama_user ?>" placeholder="Nama User">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Bagian</label>
                    <div class="col-sm-9">
                        <select name="f_bagian" id="" class="form-control" required>
                            <option value="">--Pilih--</option>
                            
                            <?php foreach ($bagian as $bg) {
                            if ($bg->id_bagian != 10) { ?>
                                    <option value="<?php echo $bg->id_bagian?>" <?php echo ($id_bagian==$bg->id_bagian) ? 'selected' : ''; ?>><?php echo $bg->nama_bagian ?></option>';
                        <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="f_username" value="<?php echo $username ?>" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <div class="input-group date datepicker">
                            <input type="password" class="form-control pwd" name="f_password"><span class="input-group-addon reveal"><i data-feather="sun"></i></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="javascript:history.go(-1)" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>