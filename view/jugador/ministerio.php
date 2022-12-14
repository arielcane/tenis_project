<nav class="navbar navbar-default" role="navigation">
<div class="container">
<a class="navbar-brand" href="index.php"><img src="assets/images/mzagobierno.png" width="50px"></a>
<ul class="nav navbar-nav navbar-right">
      			<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
</ul>
</div>
</nav>

<h1 class="page-header">
    Ministerios
</h1>

<ol class="breadcrumb">
  <li><a href="?c=expediente">Inicio</a></li>
  <li class="active">Ministerio</li>
  <div align="right"><a href="?c=expediente">Volver</a></div>
</ol>
<!-- FIN Barra de navegacion superior -->




<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=ministerio&a=Nuevo">Nuevo Ministerio</a>
</div>





<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:50px;">#</th>
            <th style="width:500px;">Nombre</th>
            <th style="width:350px;">Responsable</th>
            <th style="width:50px;">Estado</th>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>


        </tr>
    </thead>
    <tbody>
    <?php
    $i=1;



        foreach($this->model->Listar() as $r): ?>
        <tr>
        	<td><?php echo $i++; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->persona; ?></td>
            <td><?php if($r->estado == 1) echo "ACTIVO";
                      else echo "INACTIVO";  ?></td>

            <td></td>

            <td>

            </td>
            <td>
                <a href="?c=ministerio&a=Crud&id_min=<?php echo $r->id_min; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
            <td>
                <!--<a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=ministerio&a=Eliminar&id_min=<?php echo $r->id_min; ?>"><span class='glyphicon glyphicon-trash'></span></a>-->
            </td>
        </tr>
        <?php endforeach;
        if(!isset($r)) echo "<tr><td colspan='9'>No existen registros</td></tr>";
    ?>


    </tbody>
</table>
