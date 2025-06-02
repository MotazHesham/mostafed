<!-- Choices JS -->
<script src="{{ asset('build/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

<!-- Bootstrap Css -->
<link id="style" href="{{ asset('build/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Node Waves Css -->
<link href="{{ asset('build/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

<!-- Simplebar Css -->
<link href="{{ asset('build/assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

<!-- Color Picker Css -->
<link rel="stylesheet" href="{{ asset('build/assets/libs/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('build/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

<!-- Choices Css -->
<link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

<!-- FlatPickr CSS -->
<link rel="stylesheet" href="{{ asset('build/assets/libs/flatpickr/flatpickr.min.css') }}">

<!-- Auto Complete CSS -->
<link rel="stylesheet" href="{{ asset('build/assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}">

<!-- Datatables Cdn -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

<!-- Dropzone CSS -->
<link rel="stylesheet" href="{{asset('build/assets/libs/dropzone/dropzone.css')}}">

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
