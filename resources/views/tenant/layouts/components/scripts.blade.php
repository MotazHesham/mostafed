
          <!-- Scroll To Top -->
          <div class="scrollToTop">
               <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
          </div>
          <div id="responsive-overlay"></div>
          <!-- Scroll To Top -->

          <!-- Popper JS -->
          <script src="{{global_asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>

          <!-- Bootstrap JS -->
          <script src="{{global_asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

          <!-- Node Waves JS-->
          <script src="{{global_asset('assets/libs/node-waves/waves.min.js')}}"></script>

          <!-- Simplebar JS -->
          <script src="{{global_asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
          <script src="{{global_asset('assets/js/simplebar.js')}}"></script>

          <!-- Auto Complete JS -->
          <script src="{{global_asset('assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js')}}"></script>

          <!-- Color Picker JS -->
          <script src="{{global_asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>

          <!-- Date & Time Picker JS -->
          <script src="{{global_asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>

          <!-- Jquery Cdn -->
          <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

          <!-- Datatables Cdn -->
          <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
          <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
          <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

          <!-- Select2 Cdn -->
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
          
          <!-- Dropzone JS -->
          <script src="{{global_asset('assets/libs/dropzone/dropzone-min.js')}}"></script>

          <script>
               $(function() {
                    let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
                    let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
                    let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
                    let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
                    let printButtonTrans = '{{ trans('global.datatables.print') }}'
                    let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
                    let selectAllButtonTrans = '{{ trans('global.select_all') }}'
                    let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'
          
                    let languages = {
                         'ar': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json',
                         'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
                    };
          
                    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                         className: 'btn'
                    })
                    $.extend(true, $.fn.dataTable.defaults, {
                         language: {
                              url: languages['{{ app()->getLocale() }}']
                         },
                         columnDefs: [{
                              orderable: false,
                              className: 'select-checkbox',
                              targets: 0
                         }, {
                              orderable: false,
                              searchable: false,
                              targets: -1
                         }],
                         select: {
                              style: 'multi+shift',
                              selector: 'td:first-child'
                         }, 
                         order: [],
                         scrollX: true,
                         pageLength: 100,
                         dom: '<"row"<"col-sm-12"<"d-flex justify-content-between align-items-center flex-wrap"<"d-flex align-items-center"lB><"d-flex align-items-center"f>>>>rtip<"actions">',
                         buttons: [{
                                   extend: 'selectAll',
                                   className: 'btn-primary-light rounded-pill',
                                   text: selectAllButtonTrans,
                                   exportOptions: {
                                   columns: ':visible'
                                   },
                                   action: function(e, dt) {
                                   e.preventDefault()
                                   dt.rows().deselect();
                                   dt.rows({
                                        search: 'applied'
                                   }).select();
                                   }
                              },
                              {
                                   extend: 'selectNone',
                                   className: 'btn-primary-light rounded-pill',
                                   text: selectNoneButtonTrans,
                                   exportOptions: {
                                   columns: ':visible'
                                   }
                              },
                              {
                                   extend: 'copy',
                                   className: 'btn-light rounded-pill',
                                   text: copyButtonTrans,
                                   exportOptions: {
                                   columns: ':visible'
                                   }
                              },
                              {
                                   extend: 'csv',
                                   className: 'btn-light rounded-pill',
                                   text: csvButtonTrans,
                                   exportOptions: {
                                   columns: ':visible'
                                   }
                              },
                              {
                                   extend: 'excel',
                                   className: 'btn-light rounded-pill',
                                   text: excelButtonTrans,
                                   exportOptions: {
                                   columns: ':visible'
                                   },
                                   customize: function(xlsx) {
                                   var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                   $('row:first c', sheet).attr('s', '2');
                                   }
                              },
                              {
                                   extend: 'print',
                                   className: 'btn-light rounded-pill',
                                   text: printButtonTrans,
                                   exportOptions: {
                                   columns: ':visible'
                                   }
                              }, 
                         ]
                    }); 

               });
               
               // Add event listener for sidebar toggle
               $(document).on('click', '[data-nav-layout="vertical"]', function() {
                    setTimeout(function() {
                         $('table[class*="datatable-"]').DataTable().columns.adjust();
                    }, 300);
               }); 
               
               $(document).ready(function() {
                    $('.select2').select2();
                    $('.select-all').click(function () {
                         let $select2 = $(this).parent().siblings('.select2')
                         $select2.find('option').prop('selected', 'selected')
                         $select2.trigger('change')
                    })
                    $('.deselect-all').click(function () {
                         let $select2 = $(this).parent().siblings('.select2')
                         $select2.find('option').prop('selected', '')
                         $select2.trigger('change')
                    })
               });
          </script>
          @yield('scripts')