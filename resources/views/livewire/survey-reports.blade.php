
<div>
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
                  <form  wire:submit.prevent="getResults">
                    <div class="row filters  ">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm" id="fromDate" wire:model="fromDate" />
                            </div>
                            <label for="date" class="col-form-label col-sm-2">Search From</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm" id="toDate" wire:model="toDate" />
                            </div>
                            <label for="date" class="col-form-label col-sm-2">Search To</label>
                        </div>
                        {{-- service filter --}}
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="form-group text-start">
                                <label for="" id="">{{ __('survey.service') }}</label>
                                <select 
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
{{-- 
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="form-group text-start">
                                <label for="" id="">{{ __('survey.sections') }}</label>
                                <select attribute="" id="" name=""
                                    class="form-select form-select-sm select2 p-2 filter" wire:model="section">
                                    <option value="" disabled selected>اختر خدمة </option>
                                    <option value="all">{{ __('dash::dash.all') }}</option>

                                    @foreach ($sections as $key => $section)
                                        <option value="{{ $key }}">{{ $section }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                    </div>
                    <button class="btn btn-primary" type="submit">{{ __('dash::dash.search') }}  </button>
                    {{-- <div wire:loading.delay>...</div> --}}
                </form>
      
            </div>
            
            <div class="card-body px-3 pb-2 " id="print-content" >
                
                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h4>{{ __('survey.all') }}:</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h2><span class="badge badge-info">{{ $all??0 }}</span></h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 p-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h3>{{ __('survey.positiveu') }}:</h3>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <h2><span class="badge badge-success">{{ $positive??0 }}</span></h2>
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
{{-- 
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
                        </script> --}}
                        </div>
                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
 
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                
                <button  id="pdfBt" class="btn btn-outline-light buttons-copy buttons-html5"  tabindex="0" aria-controls="example" onclick="printTable()" type="button"><span>{{ __('dash::dash.print') }}</span></button> 
                <button  id="pdfBt" class="btn btn-outline-light buttons-copy buttons-html5"  tabindex="0" aria-controls="example" onclick="pdfTable()" type="button"><span>{{ __('dash::dash.pdf') }}</span></button> 
            </div>
      
            <div class="card-body">
           
                <table id="myTable" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('survey.service') }}</th>
                            <th>{{ __('survey.branch') }}</th>
                            <th>{{ __('dash.guests') }}</th>
                            <th>{{ __('survey.phone') }}</th>
                            <th>{{ __('survey.status') }}</th>
                            <th>{{ __('survey.time') }}</th>
                      
                        </tr>
                    </thead>
                    <tbody>
    @if ($filter)
        
         @foreach ($data as $d )
    
             <tr>
                 <td>{{$selectedService??'all'  }}</td>
                 <td>{{$d->service->name  ??'all'}}</td>
                 <td>{{ $d->guest->name }}</td>
                 <td>{{ $d->guest->phone }}</td>
                 <td> {!! __('survey.'.$d->status) !!}</td>
                 <td>{{ $d->created_at }}</td>
                </tr>
                @endforeach
                
     @endif
                      
                
                     
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __('survey.service') }}</th>
                            <th>{{ __('survey.branch') }}</th>
                            <th>{{ __('dash.guests') }}</th>
                            <th>{{ __('survey.phone') }}</th>
                            <th>{{ __('survey.status') }}</th>
                            <th>{{ __('survey.time') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  
    
</div>


