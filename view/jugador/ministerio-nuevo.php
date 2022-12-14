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
    Nuevo Ministerio
</h1>

<ol class="breadcrumb">
  <li><a href="?c=ministerio">Ministerio</a></li>
  <li class="active">Nuevo Ministerio</li>
  <div align="right"><a href="?c=ministerio">Volver</a></div>
</ol>

<form id="frm-ministerio" action="?c=ministerio&a=Guardar" method="post" enctype="multipart/form-data" name="fcontacto">

	
	
	
<table width="718" height="200" class="table table-striped">
  
  <tr>
  	<td style="width:300px;">Nombre del Ministerio:</td>
  	<td>
  	  <input type="text" class="form-control" style="width : 500px"; name="nombre"  /></td>
  </tr>
  <tr>
  	<td>Responsable:</td>
  	<td>
  	  <input type="text" class="form-control" style="width : 500px"; name="persona" /></td>
  </tr>
  <tr>
  	<td>Estado:</td>
  	<td>
  	<select name="estado" class="form-control" style="width : 120px";>
  		<option value="1" SELECTED>ACTIVO</option>
  		<option value="0">INACTIVO</option>		
	</select>
  </tr>
  
</table>
	
	<hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
	
</form>

<script>
    $(document).ready(function(){
        $("#frm-ministerio").submit(function(){
            return $(this).validate();
        });
    })
</script>

