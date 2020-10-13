<?php $__env->startSection('title', 'FitNote'); ?>
<?php $__env->startSection('content'); ?>
<form action = "/insertData" method = "post">
<?php echo csrf_field(); ?>
<?php echo method_field('post'); ?>                  

<h1 align="center">Inserir Dados</h1>
<div align="center">
<label>Barriga:<input id="barriga" name="barriga" type="text"  required>
<label>Coxa:<input id="coxa" name="coxa" type="text"  required>  
<label>Gémeo:<input id="gemeo" name="gemeo"  type="text"  required>
<label>Ancas:<input id="ancas" name="ancas" type="text"  required>
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/joaocostadev/COSTA 3.0/Laravel Projects/fitnote/resources/views/insertData.blade.php ENDPATH**/ ?>