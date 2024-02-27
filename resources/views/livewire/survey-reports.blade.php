
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="text-dark text-capitalize">{{ __('survey.reports') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pb-2">
                    <div class="row filters  ">

                        {{-- service filter --}}
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="form-group text-start">
                                <label for="" id="">{{ __('survey.services') }}</label>
                                <select attribute="" id="" name=""
                                    class="form-select form-select-sm select2 p-2 filter" wire:model="selectedService"">
                                    <option value="" disabled selected>اختر خدمة </option>
                                    <option value="all">{{ __('dash::dash.all') }}</option>
                                    <option value="hotels">{{ __('survey.hotels') }}</option>
                                    <option value="hospitals">{{ __('survey.hospitals') }}</option>
                                    <option value="clubs">{{ __('survey.clubs') }}</option>
                                    <option value="coffee_shops">{{ __('survey.coffee shops') }}</option>
                                    {{-- @foreach ($options as $optkey => $optvalue)
                            <option value="{{ $optkey }}">{{ $optvalue }} </option>
                            @endforeach --}}
                                </select>
                            </div>
                        </div>
                     
                      {{-- branch filter --}}
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="form-group text-start">
                                <label for="" id="">{{ __('survey.branch') }}</label>
                                <select attribute="" id="" name=""
                                    class="form-select form-select-sm select2 p-2 filter" wire:model="service">
                                    <option value="" disabled selected>اختر الفرع </option>
                                    <option value="all">{{ __('dash::dash.all') }}</option>
                                    @foreach ($options as $option)
                                        <option value="{{ $option->id }}">{{ $option->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="form-group text-start">
                                <label for="" id="">{{ __('survey.sections') }}</label>
                                <select attribute="" id="" name=""
                                    class="form-select form-select-sm select2 p-2 filter" wire:model="section">
                                    <option value="" disabled selected>اختر خدمة </option>
                                    <option value="all">{{ __('dash::dash.all') }}</option>
                                    
                                    @foreach ($sections as $key=>  $section)
                            <option value="{{ $key }}">{{ $section }} </option>
                            @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-body px-3 pb-2 " id="print-content" >

                    <div class="row">

                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h4>{{ __('survey.all') }}:</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h2><span class="badge badge-info">{{ $all }}</span></h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h3>{{ __('survey.positiveu') }}:</h3>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h2><span class="badge badge-success">{{ $positive }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h3>{{ __('survey.negativeu') }}:</h3>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h2><span class="badge badge-danger">{{ $negative }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p-2">

                        <button type="button" class="btn btn-primary" onclick="customPrint()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"></path>
                                <path
                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1">
                                </path>
                            </svg>
                            {{ __('dash::dash.print') }}
                        </button>
                        
                        <script>
                            function customPrint() {
                                window.print();
                            }
                        </script>
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                            
                                <th>{{ __('survey.service') }}</th>
                                <th>{{ __('survey.branch') }}</th>
                                {{-- <th>{{ __('survey.status') }}</th>
                                <th>{{ __('survey.time') }}</th> --}}
                            </tr>
                               
                        </thead>
                        <tbody>
                        
                        @if ($selectedService  &&$service )
                        <tr>
                                
                            <td>{{ $selectedService }}</td>
                            <td>{{ $service }}</td>
                            
                        </tr>  
                        @endif
                     
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('survey.service') }}</th>
                                <th>{{ __('survey.branch') }}</th>
                                {{-- <th>{{ __('survey.status') }}</th>
                                <th>{{ __('survey.time') }}</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>





<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js/data-table.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

<script>var table = new DataTable('#example', {
    language: {
        url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/ar.json',
    },
});</script>
