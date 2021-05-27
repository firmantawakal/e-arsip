<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<a
					role="button"
					href="<?php echo site_url('user/create') ?>"
					class="btn btn-success"
					>Tambah User</a
				>
				<br /><br />
				<div class="table-responsive" style="overflow-y: hidden">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Action</th>
								<th style="width: 10px">No</th>
								<th>Username</th>
								<th>Nama User</th>
								<th>Level</th>
								<th>Bagian</th>
							</tr>
						</thead>

						<tbody>
							<?php
                                $no=1;
                                foreach($user as $data){
                            ?>
							<tr>
								<td>
									<a
										role="button"
										href="<?php echo site_url('user/update/'.$data->username) ?>"
										title="Edit"
										class="btn btn-primary"
										>Edit</a
									>&nbsp;
									<button
										type="button"
										data-target="#modal-fade<?php echo $data->username; ?>"
										data-toggle="modal"
										class="btn btn-danger"
									>
										Hapus
									</button>
								</td>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->username ?></td>
								<td><?php echo $data->nama_user ?></td>
								<td><?php echo $data->level ?></td>
								<td><?php echo $data->nama_bagian ?></td>
							</tr>

							<div
								id="modal-fade<?php echo $data->username; ?>"
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
												href="<?php echo site_url('user/delete/'.$data->username) ?>"
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
