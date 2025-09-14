<div class="container pt-5">
    <h3><?= esc($title) ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Permohonan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Permohonan Pengajuan</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open('', ['id' => 'FrmAddMahasiswa', 'method' => 'post', 'name' => 'autoSumForm']) ?>
                    
                    <div class="form-group row">
                        <label for="besar_pinjaman" class="col-sm-2 col-form-label">Besar Pinjaman</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="besar_pinjaman" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('besar_pinjaman') ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keperluan" class="col-sm-2 col-form-label">Untuk Keperluan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keperluan" value="<?= old('keperluan') ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="masa_angsuran" class="col-sm-2 col-form-label">Masa Angsuran</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="masa_angsuran" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('masa_angsuran') ?>">
                        </div>
                        <label for="masa_angsuran" class="col-sm-2 col-form-label">Bulan</label>
                    </div>

                    <div class="form-group row">
                        <label for="mulai_bulan" class="col-sm-2 col-form-label">Mulai Bulan</label>
                        <div class="col-sm-2">
                            <input type="month" class="form-control" name="mulai_bulan" value="<?= old('mulai_bulan') ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ttd_permohonan" class="col-sm-2 col-form-label">Tanda Tangan</label>
                        <div class="col-sm-10">
                            <div id="sig"></div><br>
                            <input type="hidden" id="signature64" name="ttd_permohonan" value="<?= old('ttd_permohonan') ?>">
                            <button id="clear">Hapus Tanda Tangan</button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="<?= base_url('anggota/permohonan') ?>">Kembali</a>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .kbw-signature { width: 200px; height: 200px; }
    #sig canvas { width: 100% !important; height: auto; }
</style>

<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>

<script>
function startCalc() {
    interval = setInterval("calc()", 1);
}

function calc() {
    one = document.autoSumForm.besar_pinjaman.value;
    two = document.autoSumForm.masa_angsuran.value;
    result = (one * 1) / (two * 1);
    document.autoSumForm.angsuran.value = result;
}

function stopCalc() {
    clearInterval(interval);
}
</script>

<script>
function startCalcBulan() {
    interval = setInterval("calcBulan()", 1);
}

function calcBulan() {
    one = document.autoSumForm.mulai_bulan.value;
    two = document.autoSumForm.masa_angsuran.value;
    result = new Date(new Date(one).setMonth(new Date(one).getMonth() + parseInt(two))).toISOString().substr(0, 7);
    document.autoSumForm.selesai_bulan.value = result;
}

function stopCalcBulan() {
    clearInterval(interval);
}
</script>

<script type="text/javascript">
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
    }
</script>
