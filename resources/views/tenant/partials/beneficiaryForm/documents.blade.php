<div class="row gy-4">
    <div class="col-md-12"> 
        <div class="row">
            @foreach ($requiredDocuments as $document)
                @include('utilities.form.dropzone', [
                    'name' => 'documents['.$document->id.']',
                    'id' => 'documents_'.$document->id,
                    'label' => $document->name,
                    'url' => route('admin.beneficiary-files.storeMedia'),
                    'isRequired' => $document->is_required,
                    'grid' => 'col-md-4',
                    'helperBlock' => '',
                    'model' => $beneficiary->beneficiaryFiles ? $beneficiary->beneficiaryFiles->where('required_document_id', $document->id)->first() : null,
                    'collectionName' => 'file',
                ]) 
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary mt-3">
            {{ trans('global.update') }}
        </button>
    </div>
</div>