<nav class="navbar navbar-default" role="navigation">
<div class="container">
<a class="navbar-brand" href="index.php"><img src="assets/images/mzagobierno.png" width="50px"></a>
<ul class="nav navbar-nav navbar-right">
      			<li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
</ul>
</div>
</nav>

<h1 class="page-header">
    Editar Ministerio
</h1>

<ol class="breadcrumb">
  <li><a href="?c=ministerio">Ministerio</a></li>
  <li class="active">Editar Ministerio</li>
  <div align="right"><a href="?c=ministerio">Volver</a></div>
</ol>

<form id="frm-ministerio" action="?c=ministerio&a=Editar" method="post" enctype="multipart/form-data" name="fcontacto">
    <input type="hidden" name="id_min" value="<?php echo $min->id_min; ?>" />





<table width="718" height="200" class="table table-striped">

  <tr>
  	<td style="width:300px;">Nombre del Ministerio:</td>
  	<td>
  	  <input type="text" class="form-control" style="width : 500px"; name="nombre" value="<?php echo $min->nombre; ?>" readonly/>
  	</td>
  </tr>
  <tr>
  	<td>Responsable:</td>
  	<td>
  	  <input type="text" class="form-control" style="width : 500px"; name="persona" value="<?php echo $min->persona; ?>" readonly/></td>
  </tr>
  <tr>
  	<td>Estado:</td>
  	<td>
  	<?php if ($min->estado == "1") $ac = "SELECTED";
    elseif ($min->estado == "0") $in = "SELECTED";
    ?>
    <select name="estado" class="form-control" style="width : 120px";>
  		<option value="1" <?php echo $ac; ?>>ACTIVO</option>
  		<option value="0" <?php echo $in; ?>>INACTIVO</option>
	</select>
	</td>
  </tr>

</table>

	  <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-ministerio").submit(function(){
            return $(this).validate();
        });
    })
</script>
