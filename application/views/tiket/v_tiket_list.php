
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<h6 class="card-title">Data Produk</h6>
			<a
				role="button"
				href="<?php echo site_url('tiket/create') ?>"
				class="btn btn-success"
				>Tambah</a
			>
			<br /><br />
			<div class="table-responsive">
				<table id="dataTableExample" class="table">
					<thead>
						<tr>
							<th style="width: 100px">Action</th>
							<th style="width: 10px">No</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jenis</th>
							<th>Kategori</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$this->session->set_flashdata('alert', "add-success");
							echo '<script type="text/javascript">',
								'showSwal("add-success");',
								'</script>'
							;
							$no=1;
							foreach($tiket as $data){
						?>
						<tr>
							<td>
								<a
									role="button"
									href="<?php echo site_url('tiket/update/'.$data->id_tiket) ?>"
									title="Edit"
									class="btn btn-primary btn-xs"
									><i class="fa fa-pencil"></i></a
								>&nbsp;
								<button
									type="button"
									data-target="#modal-fade<?php echo $data->id_tiket; ?>"
									data-toggle="modal"
									class="btn btn-danger btn-xs"
								>
									<i class="fa fa-trash"></i>
								</button>
							</td>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data->nama_tiket ?></td>
							<td><?php echo $this->string_->rupiah($data->harga_tiket) ?></td>
							<td><?php echo $data->jenis ?></td>
							<td><?php echo $data->nama_kategori ?></td>
						</tr>

						<div
							id="modal-fade<?php echo $data->id_tiket; ?>"
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
											href="<?php echo site_url('tiket/delete/'.$data->id_tiket) ?>"
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
<script type="text/javascript">
    $(function() {
    showSwal = function(type) {
        'use strict';
        if (type === 'add-success') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1113000
            });
            
            Toast.fire({
                icon: 'success',
                title: 'Data Berhasil Ditambah'
            })
        }
    }
    });
</script>