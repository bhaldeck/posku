<section class="content-header">
	<h1>Penjualan
		<small>Penjualan Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?=site_url('dashboard') ?>">
			<i class="fa fa-dashboard"></i></a>
		</li>
        <li>Transaksi</li>
		<li class="active">Penjualan</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="tanggal">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="user" id="user" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="pelanggan">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <select name="pelanggan" id="pelanggan" class="form-control">
                                        <option value="">Umum</option>
                                        <?php foreach($pelanggan as $row => $value): ?>
                                         <option value="<?=$value->pelanggan_id?>"><?=$value->pelanggan_nama?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="barang_id">
                                    <input type="hidden" id="harga">
                                    <input type="hidden" id="stok">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Produk Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th width="10%">Diskon</th>
                                <th width="15%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <tr>
                                <td colspan="9" class="text-center">Tidak Ada Item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="subtotal" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="diskon">Diskon</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="diskon" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="grandtotal">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grandtotal" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="cash">Tunai</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="change">Kembali</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="note">Catatan</label>
                            </td>
                            <td>
                                <div >
                                    <textarea  id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Batal
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Proses Pembayaran
                </button>
            </div>
        </div>
    </div>

</section>