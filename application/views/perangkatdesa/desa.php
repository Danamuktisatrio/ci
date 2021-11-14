<!DOCTYPE html>
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
            <h5 class = "card-title text-center">UP DDADD</h5>
                <form>
                    <div class="container">
                        <div class = "form-group ">
                        <label for="exampleFromControlSelect">Kecamatan</label>
                        <select class="form-control" id="Kecamatan" name="kecamatan" aria-required="false">
                            <option value="0" >Pilih Kecamatan</option>
                            <?php foreach($datakec as $kec) : ?>
                            <option value="<?php echo $kec->id_kec;?>"> <?php echo $kec->Nama_Kec; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>
                
            
            <form method="post" action="<?php echo base_url ('PerangkatDesa/Tambah')?>">
                
                <div class = "form-group">
                        <label for="exampleFromControlSelect">Desa</label>
                        <select class="form-control" id="Desa" name="desa" >
                        <option value="0">Pilih Desa</option>                                
                    </select>  
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
                crossorigin="anonymous"></script>
                <script>
                $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)                                    
                    $('#Kecamatan').change(function(){ // Ketika user mengganti atau memilih data provinsi
                        var id = $(this).val();
                        $.ajax({
                            type : "POST",
                            url : "<?= base_url('PerangkatDesa/getDesa')  ?>",
                            data : {
                                id: id
                            },
                            dataType: "JSON",
                            success: function(response) {
                                console.log(response);
                                $('#Desa').html(response);
    
                            }
    
                        }); 
                     });
                 });
            </script>
        <div class="container">
        <div class="form-group">
            <label>FotoDekat</label>
            <input type="file" class="form-control"name="gambar_dekat" required>
        </div>
        <div class="form-group">
            <label>FotoJauh</label>
            <input type="file" class="form-control"name="gambar_jauh" required>
        </div>
        </div>
        <div class="container">
            <a  class ="btn btn-danger" href="<?= base_url('PerangkatDesa'); ?>">Reset</a>
            <button type="submit" class ="btn btn-primary" >Simpan</button>
            <a href="DDADD_history" type="button" class="btn btn-info">CekData</a>
        </div>
            </form>                
            </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>
                    
                    
            
            
