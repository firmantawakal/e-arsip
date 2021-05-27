<style>
.image-modal
{
  display: block;
  width: auto;
  max-height: 100%
}
</style>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<?php 
        		if ($this->session->userdata('level')!='kapolsek') { ?>
				<a
					role="button"
					href="<?php echo site_url('suratkeluar/create') ?>"
					class="btn btn-success"
					>Tambah Surat Keluar</a
				>
				<?php } ?>
				<br /><br />
				<div class="table-responsive" style="overflow-y: hidden">
					<table class="table table-hover" id="dataTableExample">
						<thead>
							<tr>
								<th>Action</th>
								<th style="width: 10px">No</th>
								<th>No. Surat Keluar</th>
								<th>Tgl. Surat Keluar</th>
								<th>Bagian</th>
								<th>Tujuan</th>
								<th>Isi</th>
								<th>Jenis</th>
							</tr>
						</thead>

						<tbody>
							<?php
                                $no=1;
                                foreach($suratKeluar as $data){
                            ?>
							<tr>
								<td>
								<?php 
        							if ($this->session->userdata('level')=='admin') { ?>
									<!-- <a
										role="button"
										href="<?php //echo site_url('suratkeluar/update/'.$data->id_suratkeluar) ?>"
										title="Edit"
										class="btn btn-warning"
										><i class="fa fa-pencil" aria-hidden="true"></i></a
									>&nbsp; -->
									<?php } ?>
									<!-- <button
										type="button"
										data-target="#modal-fade<?php //echo $data->id_suratkeluar; ?>"
										data-toggle="modal"
										class="btn btn-danger"
									>
										Hapus
									</button> -->
									<?php 
									$ext = pathinfo($data->file, PATHINFO_EXTENSION);
									if ($ext != 'pdf') { ?>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $data->id_suratkeluar ?>" title="File">
										<i class="fa fa-file" aria-hidden="true"></i>
									</button>
									<?php 
									}else{ ?>
									<a type="button" class="btn btn-primary" target="blank_" href="./uploads/<?php echo $data->file ?>" title="File">
										<i class="fa fa-file" aria-hidden="true"></i>
									</a>
									<?php 
									}
									?>
									
								</td>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->no_suratkeluar ?></td>
								<td><?php echo $this->string_->dbdate_to_indo($data->tgl_suratkeluar) ?></td>
								<td><?php echo $data->nama_bagian ?></td>
								<td><?php echo $data->alamat_suratkeluar ?></td>
								<td><?php echo $data->isi_singkat ?></td>
								<td><?php echo $data->nama_jenis ?></td>
								
							</tr>

							<div
								id="modal-fade<?php echo $data->id_suratkeluar; ?>"
								class="modal fade"
								tabindex="-1"
								role="dialog"
								aria-hidden="true"
							>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button
												type="button"
												class="close"
												data-dismiss="modal"
												aria-hidden="true"
											>
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
											<a
												href="<?php echo site_url('suratkeluar/delete/'.$data->id_suratkeluar) ?>"
												class="btn btn-effect-ripple btn-danger"
												>Ya</a
											>
											<button
												type="button"
												class="btn btn-effect-ripple btn-default"
												data-dismiss="modal"
											>
												Tidak
											</button>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal -->
							<div class="modal fade" id="modal<?php echo $data->id_suratkeluar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-xl" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Surat</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<div class="modal-body">
										<img class="img-fluid" src="./uploads/<?php echo $data->file ?>" alt="">
									</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											
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
