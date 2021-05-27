<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"><?php echo $title ?></h6>
            <div id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
            <form autocomplete="off" action="<?php echo $action ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                <input type="hidden" name="f_username_hid" value="<?php echo $username_hid ?>" class="form-control">
                
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="f_username" value="<?php echo $username ?>" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama User</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_nama_user" value="<?php echo $nama_user ?>" placeholder="Nama User">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control"  name="f_password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-9">
                        <select name="f_level" class="form-control">
                            <option>Pilih level...</option>
                                <option value="admin" <?php if ('admin' == $level) : ?> selected <?php endif; ?>>Admin</option>
                                <option value="kasir" <?php if ('kasir' == $level) : ?> selected <?php endif; ?>>Kasir</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="javascript:history.go(-1)" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>