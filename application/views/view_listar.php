<div class="container">
  <h2>Lista de registro</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Correo</th>
        <th>
          <center>Acciones</center>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php #var_dump($preregistro); 
      ?>
      <?php foreach ($preregistros as $row) { ?>
        <tr>
          <td><?php echo $row['id_preregistro']; ?></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['apaterno']; ?></td>
          <td><?php echo $row['amaterno']; ?></td>
          <td><?php echo $row['correo']; ?></td>
          <td><a href="<?php echo base_url('welcome/actualizar') . '/' . $row['id_preregistro']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>