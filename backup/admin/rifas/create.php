<?php
session_start();
if (!$_SESSION['auth'] == 1) {
  header("location: ../");
}

require_once("../../classes/global.php");

?><!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("../includes/header.php"); ?>
</head>

<body id="page-top" class="sidebar-toggled">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Rifas Sistem</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <?php require_once("../includes/navbar.php"); ?>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->  
    <?php require_once("../includes/menu.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
<!-- 
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1>Crear Nueva Rifa</h1> 
            <p>Favor completar los campos que contienen un ( <span class="text-danger">*</span> )</p> 
          </div>
        </div> -->
        <div class="alert alert-success alert-dismissible" id="notification" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col">
            <form action="../../classes/create_raffle.php" method="post" enctype="multipart/form-data" id="create_raffle_form">
              <input type="hidden" id="hidden_list_container" name="hidden_list_container" readonly>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="exampleFormControlInput1">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nombre Rifa">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlInput1">Logo</label>
                  <input type="file" class="form-control-file" accept="image/*" id="logo_image" name="logo_image">
                </div>
              </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <input type="file" class="custom-file-input" id="header_image" accept="image/*" name="header_image">
                    <label class="custom-file-label" for="customFileLang">Imagen Cabecera</label>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="file" class="custom-file-input" id="rigth_image" accept="image/*" name="rigth_image">
                    <label class="custom-file-label" for="customFileLang">Imagen Derecha</label>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="file" class="custom-file-input" id="left_image" accept="image/*" name="left_image">
                    <label class="custom-file-label" for="customFileLang">Imagen Izquerda</label>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="file" class="custom-file-input" id="footer_image" accept="image/*" name="footer_image">
                    <label class="custom-file-label" for="customFileLang">Imagen Abajo</label>
                  </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="select_list_type">Tipo Contenido</label>
                  <select class="form-control" name="select_list_type" id="select_list_type">
                    <option value="0">Seleccione ...</option>
                    <option value="1">Imagenes</option>
                    <!-- <option value="2">Lista</option> -->
                  </select>
                </div>
              </div>

              <div class="form-row" id="container_photos_hidden" style="display:none;">
                <div class="form-group col-md-4">
                  <label for="exampleFormControlInput1">Selecciones Las Iamgenes</label>
                  <input type="file" name="files[]" multiple class="form-control-file" id="files" accept="image/*">
                </div>
              </div>

              <div class="form-row" id="container_list_hidden" style="display:none;">
                <div class="form-group col-md-6">
                  <ul class="list-group" id="container_list_tmps">
                    <li class="list-group-item">
                       <div class="form-row">
                         <div class="form-group col-md-10">
                          <input type="text" class="form-control" id="list_tmp_name" placeholder="Nombre Lista">
                        </div>
                        <div class="form-group col-md-2">
                          <button type="button" id="list_add" class="btn btn-primary">Agregar</button> 
                        </div>
                       </div>
                    </li>
                  </ul>
                </div>
              </div>

              <button type="submit" class="btn btn-primary" name="submit" id="ValidForm">Registrar</button>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- LOGOUT MODAL-->
  <?php require_once("../modals/logout.php"); ?>


  <!-- SETTINGS MODAL-->
  <?php require_once("../modals/settings.php"); ?>


  <?php require_once("../includes/footer.php"); ?>


  <script>
    $( () => {
      ClearValues();

      $("#create_raffle_form").submit(function(){

        let 
            name = $("#name").val(),
            select_list_type = $("#select_list_type").val(),
            data = "";

        if (name.length == 0) {
          alert("Nombre Requerido");
          $("#name").focus();
          return false;
        }

        //VALIDATE IMAGES
        if($("#logo_image").val() == ''){
          alert("Debe Seleccionar Imagen Logo!");
          $("#logo_image").focus();
          return false;
        }
        
        // if($("#header_image").val() == ''){
        //   alert("Debe Seleccionar Imagen Cabecera!");
        //   $("#header_image").focus();
        //   return false;
        // }
        // if($("#rigth_image").val() == ''){
        //   alert("Debe Seleccionar Imagen Lateral Derecho!");
        //   $("#rigth_image").focus();
        //   return false;
        // }
        // if($("#left_image").val() == ''){
        //   alert("Debe Seleccionar Imagen Lateral Izquierdo!");
        //   $("#left_image").focus();
        //   return false;
        // }
        // if($("#footer_image").val() == ''){
        //   alert("Debe Seleccionar Imagen Lateral Abajo!");
        //   $("#footer_image").focus();
        //   return false;
        // }
        
        if (select_list_type == 0) {
          alert("Debe Seleccionar Las Listas, o Las Imagenes!");
          $("#select_list_type").focus();
          return false;
        };


        if (select_list_type == 1 && $("#files").val() == '') {
          alert("Debe Seleccionar Almenos una Imagen!");
          $("#files").focus();
          return false;
        }

        if (select_list_type == 2 && $("#hidden_list_container").val() == '') {
          alert("Debe Seleccionar Agregar por lo menos un elemento a la lista!");
          $("#list_tmp_name").focus();
          return false;
        }



        $("#container_list_tmps li.listx").each(function(index,element){
          let d = $(this).text();
          let res = d.replace(" X", "");
          res = res + ", ";
          data += res;
        });

        str = data.replace(/,\s*$/, "");
        $("#hidden_list_container").val(str);

        let a = $("#create_raffle_form").serializefiles();
        
        $.ajax({
            url: '../../classes/create_raffle.php',
            data: a,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',     
            success: function(res){
              // console.log(res);
              let data = JSON.parse(res);

              if(data.status == 1){
                let status = data.status ==1 ? "Exito!" : "Error!";
                $("#notification").show();
                $("<strong>"+status+"</strong> <span>"+data.msg+"</span>").appendTo("#notification");
              }

              ClearValues();
            }
        });

        return false;
      });

      //VALIDATE A TYPE LIST
      $("#select_list_type").on("change", (e) => {
          let optVal= $("#select_list_type option:selected").val();
          
          if (optVal == 1) {
            $("#container_list_hidden").hide();
            $("#container_photos_hidden").show();
            $("#hidden_list_container").val('');
            $('#container_list_tmps').find('.listx').remove();
          } else if(optVal == 2){
            return false;
            $("#container_photos_hidden").hide();
            $("#container_list_hidden").show();
            $("#files").val('');
          }

      });


      //CREATE A ITEM FROM LIST
      $('#list_add').click(function(){
          var text = $('#list_tmp_name').val() + ' <button type="button" class="btn btn-danger">X</button>';
          if(text.length){
              $("<li class ='list-group-item listx'>"+text+"</li>").appendTo("#container_list_tmps");
          }
          $('#list_tmp_name').val("");
      });

      //DELETE A ITEM FROM LIST
      $('#container_list_tmps').on('click','button.btn-danger' , function(el){
        $(this).parent().remove();
      });

    });
    
    //RESET A VALUS FORM
    const ClearValues = () => {
      // $("#notification").hide();
      $("#name").val('');
      $("#logo_image").val('');
      $("#header_image").val('');
      $("#rigth_image").val('');
      $("#left_image").val('');
      $("#footer_image").val('');
      $("#select_list_type").val('0');
      $("#files").val('');
      $('#container_list_tmps').find('.listx').remove();
      $("#container_photos_hidden").hide();
    }

    /* CREATED BY LUIS RODRIGUEZ */
    //USAGE: $("#form").serializefiles();
    (function($) {
    $.fn.serializefiles = function() {
        var obj = $(this);
        /* ADD FILE TO PARAM AJAX */
        var formData = new FormData();
        $.each($(obj).find("input[type='file']"), function(i, tag) {
            $.each($(tag)[0].files, function(i, file) {
                formData.append(tag.name, file);
            });
        });
        var params = $(obj).serializeArray();
        $.each(params, function (i, val) {
            formData.append(val.name, val.value);
        });
        return formData;
    };
    })(jQuery);


    (function($) {
      $.fn.checkFileType = function(options) {
          var defaults = {
              allowedExtensions: [],
              success: function() {},
              error: function() {}
          };
          options = $.extend(defaults, options);

          return this.each(function() {

              $(this).on('change', function() {
                  var value = $(this).val(),
                      file = value.toLowerCase(),
                      extension = file.substring(file.lastIndexOf('.') + 1);

                  if ($.inArray(extension, options.allowedExtensions) == -1) {
                      options.error();
                      $(this).focus();
                  } else {
                      options.success();

                  }

              });

          });
      };

  })(jQuery);

  </script>


</body>

</html>
