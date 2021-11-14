<!Doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class = "container-fluid">
            <div class = "row justify-content-md-left">
                <div class = "col-md-6">
                    <br>
                        <div class = "card" style = "width:200%;">
                            <div class = "card-body">
                                <a href="PerangkatDesa" type="button" class="btn btn-primary mb-5">Tambah</a>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Desa</th>
                                        <th scope="col">FotoDekat</th>
                                        <th scope="col">FotoJauh</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1; 
                                        foreach($ddadd as $wilayah) : ?>
                                        <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $wilayah->Desa;?></td>
                                        <td><?= $wilayah->gambar_dekat;?></td>
                                        <td><?= $wilayah->gambar_jauh; ?></td>                                        
                                        <td><?php echo anchor('DDADD_history/Hapus/'.$wilayah->id, 
                                        '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                        <?php echo anchor('DDADD_history/Edit/'.$wilayah->id,
                                        '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                        </td>
                                    </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </body>
</html>