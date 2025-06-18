
<form method="POST" action="{{ route(($routeName ?? 'admin.beneficiaries.update'), $beneficiary->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="row gy-4">
        <div class="col-md-12"> 
            <div class="row">
                @foreach ($requiredDocuments as $document)
                    @include('utilities.form.dropzone', [
                        'name' => 'documents['.$document->id.']',
                        'id' => 'documents_'.$document->id,
                        'label' => $document->name,
                        'url' => route(($storeMediaUrl ?? 'admin.beneficiary-files.storeMedia')),
                        'isRequired' => $document->is_required,
                        'grid' => 'col-md-4',
                        'helperBlock' => '',
                        'model' => $beneficiary->beneficiaryFiles ? $beneficiary->beneficiaryFiles->where('required_document_id', $document->id)->first() : null,
                        'collectionName' => 'file',
                    ]) 
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="step" value="documents">
                {{ trans('global.update') }}
            </button>
            @if(auth()->user()->is_beneficiary)
                <button type="submit" class="btn btn-success mt-3" name="step" value="request_join">
                    {{ trans('cruds.beneficiary.extra.update_and_request_join') }}
                </button>
            @endif
        </div>
    </div>
</form>