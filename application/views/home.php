<!-- Styles -->
<style>
#chartpjlhr {
    width: 100%;
    height: 250px;
}
#chartpjl {
    width: 100%;
    height: 250px;
}
#chartdiv {
    width: 100%;
    height: 500px;
}

#chartref {
    width: 100%;
    height: 500px;
}

#chartgr {
    width: 100%;
    height: 500px;
}
</style>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
    <h4 class="mb-3 mb-md-0">Dashboard </h4> 
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap d-print-none">
        <form action="<?php echo site_url('home') ?>" method="post">
            <div class="row">
                <div class="input-group date datepicker dashboard-date btn-icon-text mr-2 mb-2 mb-md-0" >
                    <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                    <input type="text" name="tgl_dashboard" class="form-control col-lg-12" id="reportrange">
                </div>
                <button type="submit" class="btn btn-outline-info btn-icon-text btn-icon-text mr-3 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="check"></i>
                    View
                </button>
                <button target="_blank" type="button" onClick="window.print()" class="btn btn-outline-danger btn-icon-text btn-icon-text mr-3 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
    <div id="message">
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </div>
    <div class="row flex-grow">
        <div class="col-sm-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Tanggal</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <h5 class="mt-3"><?php echo $dash_date ?></5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $omset_now = $sum[0]->val_tot;
            $omset_old = $sum_old[0]->val_tot;
            $ptd_omset1=0;
            if ($omset_old > 0) {
                $ptd_omset1 = ($omset_now-$omset_old)/$omset_old*100;
            }
            $ptd_omset = number_format(floor($ptd_omset1*100)/100,2, '.', '');

            $grow=null;
            if ($ptd_omset <= 0) {
                $grow = '<p style="font-size:14px;" class="mt-3 text-danger">
                            <span>'.$ptd_omset.'%</span>
                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                          </p>';
            }else{
                $grow = '<p class="text-success">
                            <span>+'.$ptd_omset.'%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>';
            }
        ?>
        <div class="col-sm-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Omset</h6>
                    </div>
                        
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <h4 class="mt-3"><?php echo $this->string_->rupiah($sum[0]->val_tot) ?></h4>
                            <?php echo $grow ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $trans_now = $sum[0]->val_pjl;
            $trans_old = $sum_old[0]->val_pjl;
            $ptd_trans1=0;
            if ($trans_old > 0) {
                $ptd_trans1 = ($trans_now-$trans_old)/$trans_old*100;
            }
            $ptd_trans = number_format(floor($ptd_trans1*100)/100,2, '.', '');

            $grow_trans=null;
            if ($ptd_trans <= 0) {
                $grow_trans = '<p style="font-size:14px;" class="mt-3 text-danger">
                            <span>'.$ptd_trans.'%</span>
                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                          </p>';
            }else{
                $grow_trans = '<p class="text-success">
                            <span>+'.$ptd_trans.'%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>';
            }
        ?>
        <div class="col-sm-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Jumlah Transaksi</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <h4 class="mt-3"><?php echo $sum[0]->val_pjl ?></h4>
                            <?php echo $grow_trans ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $terj_now = $pr_terjual[0]->val_pr_terjual;
            $terj_old = $pr_terjual_old[0]->val_pr_terjual;
            $ptd_terj1=0;
            if ($terj_old > 0) {
                $ptd_terj1 = ($terj_now-$terj_old)/$terj_old*100;
            }
            $ptd_terj = number_format(floor($ptd_terj1*100)/100,2, '.', '');

            $grow_terj=null;
            if ($ptd_terj <= 0) {
                $grow_terj = '<p style="font-size:14px;" class="mt-3 text-danger">
                            <span>'.$ptd_terj.'%</span>
                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                          </p>';
            }else{
                $grow_terj = '<p class="text-success">
                            <span>+'.$ptd_terj.'%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>';
            }
        ?>
        <div class="col-sm-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Jumlah Produk Terjual</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <h4 class="mt-3">
                            <?php 
                            $val_terjual=0;
                            if ($pr_terjual[0]->val_pr_terjual!=null) {
                                $val_terjual = $pr_terjual[0]->val_pr_terjual;
                            };
                            echo  $val_terjual ?></h4>
                            <?php echo $grow_terj ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php 
            $vst_now = $vst[0]->val_vst;
            $vst_old = $vst_old[0]->val_vst;
            $ptd_vst1=0;
            if ($vst_old > 0) {
                $ptd_vst1 = ($vst_now-$vst_old)/$vst_old*100;
            }
            $ptd_vst = number_format(floor($ptd_vst1*100)/100,2, '.', '');
            // print_r($vst_old);
            $grow_vst=null;
            if ($ptd_vst <= 0) {
                $grow_vst = '<p style="font-size:14px;" class="mt-3 text-danger">
                            <span>'.$ptd_vst.'%</span>
                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                          </p>';
            }else{
                $grow_vst = '<p class="text-success">
                            <span>+'.$ptd_vst.'%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>';
            }
        ?>
        <div class="col-sm-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Jumlah Visitor</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <h4 class="mt-3">
                            <?php
                            $val_visit=0;
                            if ($vst[0]->val_vst!=null) {
                                $val_visit = $vst[0]->val_vst;
                            };
                            echo  $val_visit ?></h4>
                            <?php echo $grow_vst ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
</div> <!-- row -->

<?php 
    if ($isHarian == 'yes') {
        echo '<div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">

                        <div class="card-body">
                        <h5 class="card-title mb-0">Penjualan Harian</h5>

                            <div id="chartpjlhr"></div>
                        </div>
                    </div>
                </div>
            </div>';
    }else{
        echo '<div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">

                        <div class="card-body">
                        <h5 class="card-title mb-0">Penjualan</h5>

                            <div id="chartpjl"></div>
                        </div>
                    </div>
                </div>
            </div>';
    }
?>

<div class="row">
    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body">
            <h5 class="card-title mb-0">Jumlah Referensi</h5>

                <div id="chartref"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body">
            <h5 class="card-title mb-0">Jumlah Group</h5>

                <div id="chartgr"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body p-0">
                <h5 class="card-title m-3">Top 5 Kota Asal</h5>
                <div class="ml-3">
                    <b>INDONESIA</b>
                </div>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <?php 
                            $d=1;
                            foreach ($top_five as $tf) {
                        ?>
                            <li class="list-group-item"><?php echo $d++.'. '.$tf->asal_indonesia.' - '.$tf->jumlah ?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                
                <br>
                <div class="mb-1 mt-2 ml-3">
                    <b>INTERNASIONAL</b>
                </div>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <?php 
                            $d=1;
                            foreach ($top_five_inter as $tfi) {
                        ?>
                            <li class="list-group-item"><?php echo $d++.'. '.$tfi->asal_internasional.' - '.$tfi->jumlah ?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data produk terjual</h5>
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Tiket</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php 
                            $no=1;
                            foreach ($penjualan_det as $data_det) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data_det->nama_tiket ?></td>
                                <td><?php echo $data_det->jumlah ?></td>
                                <td><?php echo $this->string_->rupiah($data_det->subtotal)?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Metode Pembayaran</h5>
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Keterangan</th>
                                <th>Transaksi</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php 
                            $no=1;
                            foreach ($pembayaran as $pbyr) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $pbyr->pembayaran ?></td>
                                <td><?php echo $pbyr->transaksi ?></td>
                                <td><?php echo $this->string_->rupiah($pbyr->total)?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('home_js'); ?>

