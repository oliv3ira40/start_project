
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    @if (HelpApplicationSetting::getAppCopyright())    
                        {{ HelpApplicationSetting::getAppCopyright()->copyright }}
                    @else
                        © StartProject
                    @endif
                </footer>
                @php
                    $flash = session()->all();
                    
                    $notification = null;
                    if (isset($flash['notification'])) {
                        $notification = HelpAdmin::prepareNotification($flash['notification']);
                    }
                @endphp
                @if ($notification != null)
                    @section('type', $notification['type'])
                    @section('msg', $notification['msg'])
                @endif
                <div style="display: none;" id="config_notifications" data-type="@yield('type')">@yield('msg')</div>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Configurações</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user-desc ml-0">
                                    {!! Form::open(['url'=>route('adm.user.update_dark_mode'), 'id'=>'update_dark_mode']) !!}
                                        {!! Form::hidden('id', \Auth::user()->UserSetting->id) !!}
                                        {!! Form::hidden('method', \Request::method()) !!}

                                        <label for="dark_mode" id="label-dark-mode" style="width: min-content;">
                                            <span class="name font-weight font-15">
                                                {{ (\Auth::user()->UserSetting->dark_mode) ? 'Desativar' : 'Ativar' }}
                                                modo escuro
                                            </span>
                                        </label>
                                        <div class="div-btn-dark-mode">
                                            @if (\Auth::user()->UserSetting->dark_mode)
                                                <input id="dark_mode" type="checkbox" checked data-plugin="switchery" data-size="small" data-color="#4c5667"/>
                                            @else
                                                <input id="dark_mode" type="checkbox" data-plugin="switchery" data-size="small" data-color="#4c5667"/>
                                            @endif
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </a>
                        </li>
                        
                        @if (in_array('adm.application_appearance_settings.edit', HelpAdmin::permissionsUser()))
                            <li class="list-group-item">
                                <a href="{{ route('adm.application_appearance_settings.edit') }}" class="user-list-item text-black">
                                    <i class="mdi mdi-settings font-16"></i>
                                    <span>
                                        Config de aparência
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if (in_array('adm.application_settings.edit', HelpAdmin::permissionsUser()))
                            <li class="list-group-item">
                                <a href="{{ route('adm.application_settings.edit') }}" class="user-list-item text-black">
                                    <i class="mdi mdi-settings font-16"></i>
                                    <span>
                                        Config da aplicação
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/detect.js') }}"></script>
        <script src="{{ asset('admin/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js') }}"></script>

        @if (isset($data['required_files']) AND in_array('dropify', $data['required_files']))
            <!-- file uploads js -->
            <script src="{{ asset('admin/assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
            <script type="text/javascript">
                $('.dropify').dropify({
                    messages: {
                        'default': 'Arraste e solte um arquivo aqui ou clique',
                        'replace': 'Arraste e solte ou clique para substituir',
                        'remove': 'Remover',
                        'error': 'Ops, algo errado foi acrescentado.'
                    },
                    error: {
                        'fileSize': 'O tamanho do arquivo é muito grande'
                    }
                });
            </script>
        @endif

        <!--Morris Chart-->
        <script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js') }}"></script>

        <script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        
        <!-- Buttons examples -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/buttons.print.min.js') }}"></script>

        <!-- Key Tables -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Selection table -->
        <script src="{{ asset('admin/assets/plugins/datatables/dataTables.select.min.js') }}"></script>

        <!-- Plugins Js -->
        <script src="{{ asset('admin/assets/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

        <!-- Toastr js -->
        <script src="{{ asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>

        {{-- My js --}}
            <script src="{{ asset('js/plugins/data_tables.js') }}"></script>
            
            <script src="{{ asset('js/utilities/masks.js') }}"></script>
            <script src="{{ asset('js/utilities/via_cep.js') }}"></script>
            <script src="{{ asset('js/utilities/my_data_ranges.js') }}"></script>
            
            <script src="{{ asset('js/date_picker.js') }}"></script>
            <script src="{{ asset('js/div_update_password.js') }}"></script>
            <script src="{{ asset('js/form_advanced.js') }}"></script>
            <script src="{{ asset('js/notifications.js') }}"></script>
            
            <script src="{{ asset('js/user_settings/btn_dark_mode.js') }}"></script>

            <script src="{{ asset('js/avatars/change_avatar.js') }}"></script>
        {{-- My js --}}

    </body>
</html>