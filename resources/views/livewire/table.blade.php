<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
    
            </div>
            <div class="card-body">
           
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>{{ __('survey.service') }}</th>
                            <th>{{ __('survey.branch') }}</th> --}}
                            <th>{{ __('survey.status') }}</th>
                            <th>{{ __('survey.time') }}</th>
                      
                        </tr>
                    </thead>
                    <tbody>
             
                 @foreach ($data as $d )
                     
                 <tr>
                    
                     <td>{!!  _('survey.').$d->status!!}</td>
                     <td>{{ $d->created_at }}</td>
                    </tr>
                    @endforeach
              
                      
                
                     
                    </tbody>
                    <tfoot>
                        <tr>
                            {{-- <th>{{ __('survey.service') }}</th>
                            <th>{{ __('survey.branch') }}</th> --}}
                            <th>{{ __('survey.status') }}</th>
                            <th>{{ __('survey.time') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
