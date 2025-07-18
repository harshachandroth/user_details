<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Department')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    
<div class="container mt-5">
 <!-- Header and Add Button -->
  <div class="d-flex justify-content-between mb-3">
    <h4>Department List</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeptModal">
      Add New Department
    </button>
  </div>

  <!-- DataTable -->
   <?php if(session('success')): ?>
  <div class="alert alert-success">
    <?php echo e(session('success')); ?>

  </div>
<?php endif; ?>
  <table id="departmentTable1" class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Department Name</th>
        <th>Fllor Number</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Sample Data -->
      
       <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($row->name); ?></td>
        <td><?php echo e($row->floor_no); ?></td>
        <td>
          <button class="btn btn-sm btn-warning editBtn" data-id="<?php echo e($row->id); ?>"
          data-name="<?php echo e($row->name); ?>"
          data-floor="<?php echo e($row->floor_no); ?>"
          data-action="<?php echo e(route('departments.update', $row->id)); ?>">Edit</button>
          <button class="btn btn-sm btn-danger" data-bs-toggle="modal" 
            data-bs-target="#deleteModal" 
            data-id="<?php echo e($row->id); ?>" 
            data-name="<?php echo e($row->name); ?>">Delete</button>
   
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
    </tbody>
  </table>
</div>
<!-- delete -->
 <!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="deleteForm" >
      <?php echo csrf_field(); ?>
      <?php echo method_field('DELETE'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete <strong id="deptName"></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </div>
    </form>
  </div>
</div>

 <!-- end delete model -->
<!-- Modal -->
<div class="modal fade" id="addDeptModal" tabindex="-1" aria-labelledby="addDeptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content"method="POST" action="<?php echo e(route('departments.store')); ?>">
    <?php echo csrf_field(); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="addDeptModalLabel">Add New Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="deptName" class="form-label">Department Name</label>
          <input type="text" class="form-control" id="deptname"   name="name" required>
           <!-- <input type="text" class="form-control" id="dept"  name="dep" required> -->
           <input type="hidden" class="form-control" id="dept_id"  name="dept_id" >
        </div>
        <div class="mb-3">
          <label for="floor" class="form-label">Floor NO</label>
            <input type="text"  class="form-control" id="floor" name="floor" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Department</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="editDeptModal" tabindex="-1" aria-labelledby="editDeptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="editDeptform" method="POST" >
    <?php echo csrf_field(); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="editDeptModalLabel">Add New Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="deptName" class="form-label">Department Name</label>
          <input type="text" class="form-control" id="editdept"   name="name" required>
           <!-- <input type="text" class="form-control" id="dept"  name="dep" required> -->
           <input type="hidden" class="form-control" id="editdept_id"  name="dept_id" >
        </div>
        <div class="mb-3">
          <label for="floor" class="form-label">Floor NO</label>
            <input type="text"  class="form-control" id="editfloor" name="floor" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Department</button>
      </div>
    </form>
  </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<!-- Scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
  $(document).ready(function () {
    $('#departmentTable1').DataTable({"pageLength": 5});
   //"pageLength": 5
    // });
  });
 
  const deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');

    const form = document.getElementById('deleteForm');
    form.action = '/departments/' + id;

    document.getElementById('deptName').textContent = name;
  });

  $(document).on('click', '.editBtn', function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var floor = $(this).data('floor');
    var action = $(this).data('action');
   
    const form = document.getElementById('editDeptform');
    form.action = '/departments/' + id;
   
   // alert(form);
    $('#editdept_id').empty();
    $('#editdept').empty();
    $('#editfloor').empty();
    $('#editdept_id').val(id);
    $('#editdept').val(name);
    $('#editfloor').val(floor);
     $('#editDeptModalLabel').empty();
     $('#editDeptModalLabel').text('Edit Department');
     $('#editDeptModal').attr('action', action);
    $('<input>').attr({
      type: 'hidden',
      name: '_method',
      value: 'PUT'
    }).appendTo('#editDeptModal');
        $('#editDeptModal').modal('show');
  });
</script>


<?php /**PATH C:\xampp\htdocs\rhs\resources\views/department/department.blade.php ENDPATH**/ ?>