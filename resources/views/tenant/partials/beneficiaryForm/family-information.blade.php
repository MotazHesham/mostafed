<!-- Add Button -->
<div class="mb-3">
    <button type="button" class="btn btn-primary" onclick="showAjaxModal('{{ route('admin.beneficiary-families.create') }}',{beneficiary_id: {{ $beneficiary->id }}})">
        <i class="fas fa-plus"></i> {{ trans('global.add') }} {{ trans('cruds.beneficiaryFamily.title_singular') }}
    </button>
</div>

<div id="wrapper-family-information">
    @include('tenant.admin.beneficiaryFamilies.index',[ 
        'beneficiaryFamilies' => $beneficiary->beneficiaryFamilies,
    ])
</div>

@section('styles')
    @parent
    <style>
        .is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
@endsection

@section('scripts')
    @parent
    <script> 
        $(document).on('submit', '#storeFamilyMemberForm', function(e){
            e.preventDefault();
            var form = $(this); 
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            var method = form.attr('method');
            
            var submitBtn = $(this).find('button[type="submit"]');
            var originalBtnHtml = submitBtn.html();
            submitBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            submitBtn.prop('disabled', true);

            // Clear previous validation errors
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.invalid-feedback').remove();
            
            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    $('#wrapper-family-information').html(response.html);
                    $('#ajaxModal').modal('hide');
                    submitBtn.html(originalBtnHtml);
                    submitBtn.prop('disabled', false);
                    
                    // Show success message if provided
                    if(response.message) {
                        showToast(response.message, 'success', 'top');
                    }
                },
                error: function(xhr, status, error){
                    if (xhr.status === 422) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        
                        $.each(errors, function(field, messages) {
                            var input = form.find('[name="' + field + '"]');
                            input.addClass('is-invalid');
                            
                            // Add error message
                            var errorHtml = '<div class="invalid-feedback">' + messages[0] + '</div>';
                            input.after(errorHtml);
                        });
                        
                        // Show general error message
                        if(xhr.responseJSON.message) {
                            showToast(xhr.responseJSON.message, 'error', 'top');
                        }
                    } else {
                        // Handle other errors
                        console.log(xhr.responseText);
                        showToast('An error occurred. Please try again.', 'error', 'top');
                    }
                    submitBtn.html(originalBtnHtml);
                    submitBtn.prop('disabled', false);
                }
            });
        });
        function updateFamilyMember(){

        }
        function deleteFamilyMember(){

        }
    </script>
@endsection