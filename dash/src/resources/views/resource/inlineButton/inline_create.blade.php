@php
$resourceShortName = resourceShortName($field['resource']);
$randomAttribute = $field['attribute'].time();
@endphp

<a href="#" class="btn {{ empty($labelInline)?'btn-sm':'' }} m-1 btn-dark" title="{{ $placeholder??'' }}"  id="addInline{{ $randomAttribute }}"
 >
  {!! $labelInline??'<i class="fa fa-plus"></i>' !!}
</a>

<script type="text/javascript">
    $(document).ready(function(){
     var modal{{ $randomAttribute }} = `
     <div class="modal fade inline_modal" id="boxModal{{ $randomAttribute }}"  aria-labelledby="createBox" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="boxModal{{ $randomAttribute }}Label">{!! $field['resource']::$icon??'' !!} {{ __('dash::dash.add') }} {{ $field['name'] }}</h5>
              <i data-bs-dismiss="modal"  style="cursor: pointer;" class="fa fa-times"></i>
            </div>
            <div class="modal-body inline_modal_content content_boxModal{{ $randomAttribute }}"></div>
        </div>
      </div>
    </div>
     `;

     $(document).on('click','#addInline{{ $randomAttribute }}',function(){
        $('#boxModal{{ $randomAttribute }}').modal('show');


       $.ajax({
        url:'{{ dash('resource/'.$resourceShortName.'/new?create_with_inline=') }}'+new Date().getTime()+'&{{ $relationField??'' }}&ajax_loading=form_ajax',
        type:'get',
        dataType:'html',
        processData: false,
        contentType: false,
        cache: false,
        beforeSend:function(){
            $('.content_boxModal{{ $randomAttribute }}').empty();
           // $('body').append(modal{{ $randomAttribute }});
            $('.content_boxModal{{ $randomAttribute }}').html(`
            <center>
                <div class="spinner-border text-dark" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </center>
            `);
        },
        success:function(data){
            $('.content_boxModal{{ $randomAttribute }}').html(data);

        }
       });
      return false;
     });
     // append in first time
     $('body').append(modal{{ $randomAttribute }});

    });
</script>
