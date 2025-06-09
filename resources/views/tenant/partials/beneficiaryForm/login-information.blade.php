<div class="row justify-content-center">
    <div class="col-xl-8">
        <div class="row gy-3">
            @include('utilities.form.text', [
                'name' => 'identity_num',
                'label' => 'cruds.user.fields.identity_num',
                'isRequired' => true,
                'grid' => 'col-md-6',
                'value' => $user->identity_num ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'email',
                'label' => 'cruds.user.fields.email',
                'isRequired' => false,
                'type' => 'email',
                'grid' => 'col-md-6',
                'value' => $user->email ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'phone',
                'label' => 'cruds.user.fields.phone',
                'isRequired' => true,
                'grid' => 'col-md-6',
                'value' => $user->phone ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'phone_2',
                'label' => 'cruds.user.fields.phone_2',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'value' => $user->phone_2 ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'password',
                'label' => 'cruds.user.fields.password',
                'isRequired' => false,
                'type' => 'password',
                'grid' => 'col-md-6', 
            ]) 
        </div> 
    </div>
    <div class="col-xl-4">
        @include('utilities.form.photo', [
            'name' => 'photo',
            'id' => 'userPhoto',
            'url' => route('admin.users.storeMedia'),
            'label' => 'cruds.user.fields.photo',
            'isRequired' => false,
            'model' => $user ?? '',
        ])
    </div>
</div>
