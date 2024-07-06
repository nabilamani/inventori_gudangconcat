<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

<style>
	.data_rekap {
		padding: 15px;
	}

	.hover-card:hover {
		transform: scale(1.05);
		transition: transform 0.3s ease;
	}
</style>

<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<p>
			Selamat Datang <strong><?php echo $this->session->userdata['username']; ?></strong> di Aplikasi Inventory
			Gudang Desa <i>CondongCatur</i>
		</p>
	</div>


</div>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<?php echo $this->session->flashdata('message_edit') ?>
	<?php echo $this->session->flashdata('message_success') ?>
	<?php echo $this->session->flashdata('message') ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-dark text-white">
			Stok Barang Telah Mencapai Batas Minimum
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%"
					cellspacing="0">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Jenis Barang</th>
							<th>Stok</th>
							<th>Satuan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						if (!empty($barang)): ?>
							<?php foreach ($barang as $row):
								$stok = $row->stokbarang;
								$keluar = $row->keluar;
								$jumlah = $stok - $keluar;
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row->id_barang ?></td>
									<td><?php echo $row->nama_barang ?></td>
									<td><?php echo $row->jenis_barang ?></td>
									<td><?php echo $jumlah ?></td>
									<td><?php echo $row->satuan_barang ?></td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td colspan="6" class="text-center">Tidak Ada Data</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>
<!-- /.container-fluid -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-dark text-white">
			Rekap Jumlah Data
		</div>
		<div class="row p-4">
			<div class="col-xl-3 col-md-3">
				<div class="card border shadow h-100 hover-card">
					<div class="data_rekap card-body">
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<i class="uil uil-box fa-3x"></i>
							</div>
							<div class="col p-2">
								<div class="h5 mb-0 font-weight-bold text-dark"><?php echo $totalbarang ?> Item</div>
								<div class="text-xs font-weight-bold text-primary text-uppercase">
									Data Barang</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-3">
				<div class="card border shadow h-100 hover-card">
					<div class="data_rekap card-body">
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<i class="uil uil-sign-out-alt fa-3x"></i>
							</div>
							<div class="col p-2">
								<div class="h5 mb-0 font-weight-bold text-dark"><?php echo $barangmasuk ?> Item</div>
								<div class="text-xs font-weight-bold text-primary text-uppercase">
									Transaksi Masuk</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-3">
				<div class="card border shadow h-100 hover-card">
					<div class="data_rekap card-body">
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<i class="uil uil-export fa-3x"></i>
							</div>
							<div class="col p-2">
								<div class="h5 mb-0 font-weight-bold text-dark"><?php echo $barangkeluar ?> Item</div>
								<div class="text-xs font-weight-bold text-primary text-uppercase">
									Transaksi Keluar</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-3">
				<div class="card border shadow h-100 hover-card">
					<div class="data_rekap card-body">
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<i class="uil uil-users-alt fa-3x"></i>
							</div>
							<div class="col p-2">
								<div class="h5 mb-0 font-weight-bold text-dark"><?php echo $user ?> User</div>
								<div class="text-xs font-weight-bold text-primary text-uppercase">
									User</div>
							</div>

						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>

</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->


</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>