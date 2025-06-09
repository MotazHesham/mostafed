@include('utilities.form.text', [
    'name' => 'name',
    'label' => 'cruds.task.fields.name',
    'isRequired' => true,
    'grid' => 'col-md-6', 
])
@include('utilities.form.select', [
    'name' => 'task_priority_id',
    'label' => 'cruds.task.fields.task_priority',
    'isRequired' => true,
    'options' => \App\Models\TaskPriority::pluck('name', 'id'),
    'grid' => 'col-md-6', 
])
@include('utilities.form.textarea', [
    'name' => 'short_description',
    'label' => 'cruds.task.fields.short_description',
    'isRequired' => false,
    'grid' => 'col-md-6', 
])
@include('utilities.form.textarea', [
    'name' => 'description',
    'label' => 'cruds.task.fields.description',
    'isRequired' => false,
    'grid' => 'col-md-6', 
])
@include('utilities.form.dropzone-multiple', [
    'name' => 'attachment',
    'label' => 'cruds.task.fields.attachment',
    'url' => route('admin.tasks.storeMedia'),
    'isRequired' => false,
    'grid' => 'col-md-12', 
])
@include('utilities.form.multiselect', [
    'name' => 'assigned_tos',
    'id' => 'assigned_to_id',
    'label' => 'cruds.task.fields.assigned_to',
    'isRequired' => true,
    'options' => \App\Models\User::where('user_type', 'staff')->pluck('name', 'id'),
    'grid' => 'col-md-6', 
])
@include('utilities.form.date', [
    'name' => 'due_date',
    'id' => 'due_date',
    'label' => 'cruds.task.fields.due_date',
    'isRequired' => false,
    'grid' => 'col-md-6', 
])
@include('utilities.form.multiselect', [
    'name' => 'tags',
    'id' => 'tags',
    'label' => 'cruds.task.fields.tag',
    'isRequired' => false,
    'options' => \App\Models\TaskTag::pluck('name', 'id'),
    'grid' => 'col-md-12', 
])
