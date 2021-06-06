<style>
	.image-modal {
		display: block;
		width: auto;
		max-height: 100%
	}
</style>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin d-print-none">
    <div>
    	<h4 class="mb-3 mb-md-0"><?php echo $report_date ?></h4> 
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <form action="<?php echo site_url('suratmasuk') ?>" method="post">
            <div class="row">
                <div class="input-group date datepicker dashboard-date btn-icon-text mr-2 mb-2 mb-md-0" >
                    <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                    <input type="text" name="tgl" class="form-control col-lg-12" id="reportrange">
                </div>
                <button type="submit" class="btn btn-outline-info btn-icon-text btn-icon-text mr-3 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="check"></i>
                    View
				</button>
		</form>
			<div class="btn-group pull-right mr-3 mb-2 mb-md-0" role="group" aria-label="Basic example">
				<a href="<?php echo site_url('suratmasuk/printberkas/'.$dn_date1.'/'.$dn_date2) ?>" target="_blank"><button type="button" class="btn btn-warning btn-icon">
					<i data-feather="download"></i>
				</button></a>
			</div>
			</div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<center><h4 class="card-title">Surat Masuk</h4></center>
			<?php if ($this->session->userdata('level')=='admin') { ?>
				<a role="button" href="<?php echo site_url('suratmasuk/create') ?>" class="btn btn-success">Tambah Surat Masuk</a>
			<?php } ?>
				<br /><br />
				<div class="table-responsive" style="overflow-y: hidden">
					<table class="table table-hover" id="dataTableExample">
						<thead>
							<tr>
								<th>Action</th>
								<th style="width: 10px">No</th>
								<th>Tgl. Input</th>
								<th>No. & Tgl Surat</th>
								<th>Pengirim</th>
								<th>Isi Singkat</th>
								<th>Jenis</th>
								<th>Status</th>

							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							foreach ($suratMasuk as $data) {
							?>
								<tr>
									<td>
										<!-- <a data-toggle="tooltip" data-placement="top" role="button" href="<?php //echo site_url('suratmasuk/update/' . $data->id_suratmasuk) ?>" title="Edit" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; -->

										<?php if ($data->status_disposisi == 0) {
													if ($this->session->userdata('level')=='kapolsek') { ?>
														<button type="button" data-target="#disposisi<?php echo $data->id_suratmasuk; ?>" data-toggle="modal" class="btn btn-success">
															<i class="fa fa-arrow-right" aria-hidden="true"></i>
														</button>
													<?php } ?>
										<?php
										}else{ ?>
											<button type="button" data-target="#viewDisposisi<?php echo $data->id_suratmasuk; ?>" data-toggle="modal" class="btn btn-warning">
												<i class="fa fa-info" aria-hidden="true"></i>
											</button>
										<?php
										};
										$ext = pathinfo($data->file_suratmasuk, PATHINFO_EXTENSION);
										if ($ext != 'pdf') { ?>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $data->id_suratmasuk ?>" title="File">
												<i class="fa fa-file" aria-hidden="true"></i>
											</button>
										<?php
										} else { ?>
											<a type="button" class="btn btn-primary" target="blank_" href="./uploads/<?php echo $data->file_suratmasuk ?>" title="File">
												<i class="fa fa-file" aria-hidden="true"></i>
											</a>
										<?php
										}

										$label = '';
										if ($data->status_disposisi == 0) {
											$label = '<h5><span class="badge badge-pill badge-warning">Belum Disposisi</span></h5>';
										} else {
											$label = '<h5><span class="badge badge-pill badge-success">Sudah Disposisi</span><h5>';
											$query = $this->db->query("SELECT tindakan from disposisi where id_suratmasuk = $data->id_suratmasuk");
											$tindakan = $query->result()[0]->tindakan;
											if ($tindakan == 0) {
												$label = '<h5><span class="badge badge-pill badge-danger">Belum Ditindaklanjut</span><h5>';
											}else{
												$label = '<h5><span class="badge badge-pill badge-info">Sudah Ditindaklanjut</span><h5>';
											}
										}
										?>

									</td>
									<td><?php echo $no++ ?></td>
									<td><?php echo $this->string_->dbdate_to_indo($data->tgl_suratmasuk) ?></td>
									<td><?php echo $data->no_suratmasuk . ' - ' . $this->string_->dbdate_to_indo($data->tgl_disuratmasuk) ?></td>
									<td><?php echo $data->instansi_pengirim ?></td>
									<td><?php echo $data->isi_singkat ?></td>
									<td><?php echo $data->nama_jenis ?></td>
									<td><?php echo $label ?></td>

								</tr>

								<div id="modal-fade<?php echo $data->id_suratmasuk; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													&times;
												</button>
												<h5 class="modal-title" id="exampleModalLabel">
													Konfirmasi
												</h5>
											</div>
											<div class="modal-body">
												Anda yakin ingin menghapus data?
											</div>
											<div class="modal-footer">
												<a href="<?php echo site_url('suratmasuk/delete/' . $data->id_suratmasuk) ?>" class="btn btn-effect-ripple btn-danger">Ya</a>
												<button type="button" class="btn btn-effect-ripple btn-default" data-dismiss="modal">
													Tidak
												</button>
											</div>
										</div>
									</div>
								</div>

								<!-- Modal Show Images -->
								<div class="modal fade" id="modal<?php echo $data->id_suratmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-xl" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Surat</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<img class="img-fluid" src="./uploads/<?php echo $data->file_suratmasuk ?>" alt="">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

											</div>
										</div>
									</div>
								</div>

								<!-- Modal Disposisi -->
								<div class="modal fade" id="disposisi<?php echo $data->id_suratmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Form Disposisi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="post" action="<?php echo site_url('suratmasuk/disposisi_action') ?>">
												<input type="hidden" name="f_id_suratmasuk" value="<?php echo $data->id_suratmasuk ?>">
													<div class="form-group">
														<label class="col-form-label">Bagian</label>
														<select name="f_bagian" id="" class="form-control" required>
															<option value="">--Pilih--</option>
															
															<?php foreach ($bagian as $bg) {
																echo '<option value="'.$bg->id_bagian.'">'.$bg->nama_bagian.'</option>';
															} ?>
														</select>
													</div>
													<div class="form-group">
														<label for="message-text" class="col-form-label">Perintah</label>
														<textarea name="f_perintah" class="form-control" rows="5" id="message-text" required></textarea>
													</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Modal View Disposisi -->
								<div class="modal fade" id="viewDisposisi<?php echo $data->id_suratmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Data Disposisi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
											<?php 
												$this->db->from('disposisi');
												$this->db->join('bagian', 'bagian.id_bagian = disposisi.id_bagian');
												$this->db->where('id_suratmasuk', $data->id_suratmasuk);
												$query = $this->db->get();
												foreach ($query->result() as $row) { ?>
												<div class="form-group row">
													<div class="col-sm-4">
													<b>Tgl. Disposisi</b>
													</div>
													<div class="col-sm-8">
													:&nbsp&nbsp<?php echo $this->string_->dbdate_to_indo($row->tgl_disposisi) ?>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-4">
														<b> Bagian </b>
													</div>
													<div class="col-sm-8">
													:&nbsp&nbsp<?php echo $row->nama_bagian ?>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-4">
													<b>Perintah</b>
													</div>
													<div class="col-sm-8">
														:&nbsp&nbsp<?php echo $row->perintah ?>
													</div>
												</div>
												<?php
												}
												?>
											</div>
											<div class="modal-footer">
											<?php 
											if ($row->tindakan == 0) {
												echo '<a href="'.site_url('suratmasuk/tindaklanjut/'.$row->id_disposisi).'" type="button" class="btn btn-success">Tindaklanjut</a>';
											}
											?>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											</div>
										</div>
									</div>
								</div>
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