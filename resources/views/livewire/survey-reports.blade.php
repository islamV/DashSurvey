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
                                <label for="" id="">{{ __('survey.service') }}</label>
                                <select attribute="" id="" name=""
                                    class="form-select form-select-sm select2 p-2 filter" wire:model="selectedService"">
                                    <option value="" disabled selected>اختر خدمة </option>
                                    <option value="all">{{ __('dash::dash.all') }}</option>
                                    <option value="hotels">{{ __('dash.hotels') }}</option>
                                    <option value="hospitals">{{ __('dash.hospitals') }}</option>
                                    <option value="clubs">{{ __('dash.clubs') }}</option>
                                    <option value="coffee_shops">{{ __('dash.coffee shops') }}</option>
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
                                    class="form-select form-select-sm select2 p-2 filter" wire:model="section"">
                                    <option value="" disabled selected>اختر خدمة </option>
                                    <option value="all">{{ __('dash::dash.all') }}</option>
                                    
                                    {{-- @foreach ($options as $optkey => $optvalue)
                            <option value="{{ $optkey }}">{{ $optvalue }} </option>
                            @endforeach --}}
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
</div>
