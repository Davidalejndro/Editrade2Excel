<!doctype html>
<html lang="es">
        <head>
            <!--required meta tags-->
            <meta charset="utf-8">
            <meta name ="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Bootstrap CSS -->
            <link rel ="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <title>Prueba de lectura de archivo XLSX</title>
    </head>
    <body>
        <div class="col-lg-12" style="padding-top:20px">
            <div class="card">
                <div class="card-header">
                    <b>Importar Excel</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="file" id="txt_archivo" class="form-control" accept="">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-danger" style="width:100%" onclick="CargarExcel()">Cargar Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<!--JavaScript-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
 $('input[type="file"]').on('change', function(){
     var ext = $( this ).val().split('.').pop();
     if($( this ).val() != ''){
         if(ext == "xls" || ext == "xlsx"){
         }
         else
         {
            $( this ).val('');
            Swal.fire("Mensaje de Error","Extensión no permitida: " + ext+"","error");
         }
     }
 });
 function CargarExcel(){
     var excel = $("#txt_archivo").val();
     if(excel===""){
         return Swal.fire("Mensaje de Advertencia","Seleccionar un archivo excel","warning");
     }
     var formData = new FormData();
     var files  = $("#txt_archivo")[0].files[0];
     formData.append('archivoexcel',files);
     $.ajax({
         url:'importar_excel_ajax.php',
         type:'post',
         data:formData,
         contentType:false,
         processData:false,
         success : function (resp){
         }
     });
     return false;
 }
</script>