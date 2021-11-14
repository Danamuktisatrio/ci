<div class="container-fluid">
    <div class="row justify-content-md-left">
        <div class="col-md-6">
            <div class="card" style="width:200%">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit</h5>
                    <section class="content">
                    <?php foreach ($ddadd as $wilayah){?>
                    <form action="<?php echo base_url('DDADD_history/update')?>" method="POST">
                    <div class="container">
                        <div class="form-group">
                            <label>FotoDekat</label>
                            <input type="hidden" class="form-control"name="id" value="<?php echo $wilayah->id?>">
                            <input type="file" class="form-control"name="gambar_dekat" value="<?php echo $wilayah->gambar_dekat?>">
                        </div>
                        <div class="form-group">
                            <label>FotoJauh</label>
                            <input type="file" class="form-control"name="gambar_jauh" value="<?php echo $wilayah->gambar_jauh?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('DDADD_history'); ?>" type="reset" class="btn btn-danger">Kembali</a>
                    </div>           
                    </form>
                    <?php }?>
                </section>

                </div>
            </div>
        </div>
    </div>
</div>