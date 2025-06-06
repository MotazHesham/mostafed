
<!-- Choices JS -->
<script src="{{global_asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

<!-- Bootstrap Css -->
<link id="style" href="{{ global_asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Node Waves Css -->
<link href="{{ global_asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

<!-- Simplebar Css -->
<link href="{{ global_asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

<!-- Color Picker Css --> 
<link rel="stylesheet" href="{{ global_asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

<!-- Choices Css -->
<link rel="stylesheet" href="{{ global_asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

<!-- FlatPickr CSS -->
<link rel="stylesheet" href="{{ global_asset('assets/libs/flatpickr/flatpickr.min.css') }}">

<!-- Auto Complete CSS -->
<link rel="stylesheet" href="{{ global_asset('assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}">

<!-- Datatables Cdn -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

<!-- Filepond CSS -->
<link rel="stylesheet" href="{{global_asset('assets/libs/filepond/filepond.min.css')}}">
<link rel="stylesheet" href="{{global_asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
<link rel="stylesheet" href="{{global_asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">

<!-- Dropzone CSS -->
<link rel="stylesheet" href="{{global_asset('assets/libs/dropzone/dropzone.css')}}">

<!-- Toastify CSS -->
<link rel="stylesheet" href="{{global_asset('assets/libs/toastify-js/src/toastify.css')}}">

<style>
        .dataTables_wrapper .dt-buttons {
                float: left;
                margin-left: 1rem;
        }

        .dt-buttons .btn {
                margin-right: 5px;
        }

        [dir="rtl"] .dataTables_wrapper .dt-buttons {
                float: right;
                margin-left: 0;
                margin-right: 1rem;
        }

        [dir="rtl"] .dt-buttons .btn {
                margin-right: 0;
                margin-left: 5px;
        }
        
        table.dataTable tbody td.select-checkbox::before,
        table.dataTable tbody td.select-checkbox::after,
        table.dataTable tbody th.select-checkbox::before,
        table.dataTable tbody th.select-checkbox::after {
        top: 50%;
        }
</style>
