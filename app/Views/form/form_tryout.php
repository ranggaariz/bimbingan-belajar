<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>TryOut</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    echo form_open_multipart('pelajar/submitTryout');
                    // $attributes = array('id' => 'FrmAddMahasiswa', 'method' => "post", "autocomplete" => "off");
                    // echo form_open('', $attributes);
                    ?>

                    <?php foreach ($data_master as $key) :?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-12 col-form-label"><?= $key->soal;?></label><br>
                        <div class="form-group">
                            <?php foreach ($key->details as $row) :?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name ="jawaban<?=$key->id_soal?>" value="<?=$row->id_jawaban?>">
                                <label class="form-check-label"><?=$row->jawaban?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php endforeach; ?>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
        .kbw-signature { width: 200px; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>

<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>