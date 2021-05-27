<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"><?php echo $title ?></h6>
            <form autocomplete="off" action="<?php echo $action ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                <input type="hidden" name="f_id_tiket" value="<?php echo $id_tiket ?>" class="form-control">
                
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="f_nama_tiket" value="<?php echo $nama_tiket ?>" placeholder="Nama Produk">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Harga Produk</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="f_harga_tiket" value="<?php echo $harga_tiket ?>" placeholder="Harga Produk">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jenis Produk</label>
                    <div class="col-sm-9">
                        <select name="f_jenis" class="form-control">
                            <option value="pengunjung" <?php echo ($jenis=='pengunjung') ? 'selected' : '' ; ?>>Pengunjung</option>
                            <option value="produk" <?php echo ($jenis=='produk') ? 'selected' : '' ; ?>>Produk</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kategori Produk</label>
                    <div class="col-sm-9">
                        <select name="f_kategori" class="form-control">
                            <?php 
                                foreach($kategori as $kat){
                                    $selected = ($kat->id_kategori==$id_kategori) ? 'selected' : '' ;
                                    echo '<option value="'.$kat->id_kategori.'" '.$selected.'>'.$kat->nama_kategori.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="javascript:history.go(-1)" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>