<?php $__env->startSection('title', 'FitNote'); ?>
<?php $__env->startSection('content'); ?>
<?php echo csrf_field(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medidas</title>
  <table align="center">
  <tr>
 <h1 align="center"> <?php echo e($nome); ?></h1>
   <th>Profile ID</th> 
    <th>Barriga</th>
    <th>Coxa</th>
    <th>Gémeo</th>
    <th>Ancas</th>
    <th>Data do registo</th>
  </tr>
<?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td ><?php echo e($row->id_perfil); ?> </td>
    <td><?php echo e($row->barriga); ?></td>
    <td><?php echo e($row->coxa); ?></td>
    <td><?php echo e($row->gemeo); ?></td>
    <td><?php echo e($row->ancas); ?></td>
    <td><?php echo e($row->date); ?></td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<body>
  
</body>
</html>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel Projects\fitnote\resources\views/fit.blade.php ENDPATH**/ ?>