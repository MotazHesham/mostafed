
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

          <!-- Filepond JS -->
          <script src="{{ global_asset('assets/libs/filepond/filepond.min.js')}}"></script>
          <script src="{{ global_asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
          <script src="{{ global_asset('assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script> 
          <script src="{{ global_asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script> 

          <!-- Dropzone JS -->
          <script src="{{global_asset('assets/libs/dropzone/dropzone-min.js')}}"></script>

          <!-- Vanilla-Wizard JS -->
          <script src="{{global_asset('assets/libs/vanilla-wizard/js/wizard.min.js')}}"></script>
          <script src="{{global_asset('assets/js/form-wizard.js')}}"></script>
          
          <!-- Select2 Cdn -->
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 

          <!-- Toastify JS -->
          <script src="{{global_asset('assets/libs/toastify-js/src/toastify.js')}}"></script>

          <!-- SweetAlert2 JS -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
          </script>
          <script>
               
               function showAjaxModal(url,data) {
                    // Show the modal
                    $('#ajaxModal').modal('show');
                    
                    // Show loading spinner in modal content
                    $('#ajaxModal .modal-content').html(`
                         <div class="modal-header">
                              <h5 class="modal-title">Loading...</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body text-center py-5">
                              <div class="spinner-border text-primary" role="status">
                                   <span class="visually-hidden">Loading...</span>
                              </div>
                              <div class="mt-3">Please wait...</div>
                         </div>
                    `);
                    
                    // Make AJAX request
                    $.ajax({
                         url: url,
                         type: 'POST',
                         data: {...data, _token: '{{ csrf_token() }}'},
                         success: function(response) {
                              // Load response into modal content
                              $('#ajaxModal .modal-content').html(null); 
                              $('#ajaxModal .modal-content').html(response.html); 
                         },
                         error: function(xhr, status, error) {
                            // Show error message
                              $('#ajaxModal .modal-content').html(`
                                   <div class="modal-header">
                                        <h5 class="modal-title text-danger">Error</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <div class="alert alert-danger">
                                        <i class="ti ti-alert-circle me-2"></i>
                                        Failed to load content. Please try again.
                                        </div>
                                        <small class="text-muted">Error: ${error}</small>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   </div>
                              `);
                         }
                    });
               }

               function showAjaxOffcanvas(url, data, position = "left") {
                    $('#ajaxOffcanvas').offcanvas('show'); 
                    $('#ajaxOffcanvas').html(`
                         <div class="offcanvas-header border-bottom border-block-end-dashed">
                              <h5 class="offcanvas-title" id="ajaxOffcanvasLabel"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                         </div>
                         <div class="offcanvas-body p-0">
                              <div class="text-center py-5">
                                   <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                   </div>
                                   <div class="mt-3">Please wait...</div>
                              </div>
                         </div>
                    `);
                    $.ajax({
                         url: url,
                         type: 'POST',
                         data: {...data, _token: '{{ csrf_token() }}'},
                         success: function(response) {
                              $('#ajaxOffcanvas').html(response.html);
                         },
                         error: function(xhr, status, error) {
                              $('#ajaxOffcanvas').html(`
                                   <div class="offcanvas-header border-bottom border-block-end-dashed">
                                        <h5 class="offcanvas-title text-danger">Error</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                   </div>
                                   <div class="offcanvas-body p-0">
                                        <div class="text-center py-5">
                                             <div class="alert alert-danger">
                                                  <i class="ti ti-alert-circle me-2"></i>
                                                  Failed to load content. Please try again.
                                             </div>
                                             <small class="text-muted">Error: ${error}</small>
                                        </div>
                                   </div>    
                              `);  
                         }
                    });
               }

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
          <script> 
               function initializeFlatpickr(id) { 
                    if (document.getElementById(id) && !document.getElementById(id)._flatpickr) {
                         flatpickr("#" + id, {
                              dateFormat: '{{ config('panel.date_format') }}',
                         });
                    }
               } 
          </script>
          <script>
               function showToast(message, type = 'success', position = 'top') {
                    backgroundColor = 'var(--primary-color)';
                    if (type === 'error') {
                         backgroundColor = 'red';
                    }else if (type === 'warning') {
                         backgroundColor = 'yellow';
                    }else if (type === 'info') {
                         backgroundColor = 'blue';
                    }else if (type === 'success') {
                         backgroundColor = 'green';
                    }
                    Toastify({
                         text: message,
                         duration: 3000,
                         newWindow: true,
                         close: true,
                         gravity: position, 
                         backgroundColor: backgroundColor, 
                    }).showToast();
               }
          </script>

          <script>
               function modalAjaxSubmit(e) {
                    if (e) {
                         e.preventDefault();
                    }
                    
                    var form = $('#ajaxModal form'); 
                    var url = form.attr('action');
                    var formData = new FormData(form[0]);
                    var method = form.attr('method');
                    
                    var submitBtn = form.find('button[type="submit"]');
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
                              // If response contains html property, update the specified wrapper
                              if(response.html && response.wrapper) {
                                   $(response.wrapper).html(response.html);
                              }
                              
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
               }

               function ajaxDeleteFromTable(url, recordId, trId = null) {
                    Swal.fire({
                         title: '{{ trans('global.areYouSure') }}', 
                         icon: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#d33',
                         cancelButtonColor: '#3085d6',
                         cancelButtonText: '{{ trans('global.no') }}',
                         confirmButtonText: '{{ trans('global.yes') }}',
                    }).then((result) => {
                         if (result.isConfirmed) { 
                              var method = 'POST';
                              var formData = new FormData();
                              formData.append('_token', '{{ csrf_token() }}');
                              formData.append('id', recordId);

                              $.ajax({
                              url: url,
                              type: method,
                              data: formData,
                              processData: false,
                              contentType: false,
                              success: function(response) {
                                   if(trId) {
                                        $('#' + trId).fadeOut(400, function() {
                                             $(this).remove();
                                        });
                                   }
                                   if (response.message) {
                                        showToast(response.message, 'success', 'top');
                                   }
                              },
                              error: function(xhr, status, error) {
                                   showToast('An error occurred. Please try again.', 'error', 'top');
                              }
                              });
                         }
                    });
               }
          </script>
          @yield('scripts')
          @stack('stack-scripts')