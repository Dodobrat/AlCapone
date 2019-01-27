@extends('administration::layouts.master')

@section('content')

    <div class="box box-default">
        <div class="box-header with-border">

            {!! Form::open(['url' =>  Administration::route('products.options.update', ['shop_product' => $product->id, 'option' => $product->id]), 'method' => 'put', 'files'=> true, 'id' => 'form']) !!}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{trans('products::admin.options')}}</th>
                    <th>{{trans('products::admin.price')}}</th>
                    <th>{{trans('products::admin.action')}}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($product->options as $ex_option)
                    <tr>
                        <td>
                            {{Form::hidden('options['.$ex_option->id.'][option_id]', $ex_option->id, ['class' => 'form-control'])}}
                            {{Form::text('options['.$ex_option->id.'][option]', $ex_option->title, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                        </td>
                        <td>
                            {{Form::text('options['.$ex_option->id.'][price]', $ex_option->pivot->price, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            <button title="Изтрий" class="btn btn-sm btn-danger"
                                    data-href="{{Administration::route('products.options.destroy', ['product' => $product->id, 'value' => $ex_option->id])}}"
                                    id="adminDeleteButton-{{$ex_option->id}}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {!! Form::submit(trans('products::admin.save'), ['class' => 'btn btn-primary', 'name' => 'save']) !!}
            {!! Form::close() !!}
        </div>
    </div>


    <div class="box box-default">
        <div class="box-header with-border">

            {!! Form::open(['url' =>  Administration::route('products.options.store', ['id' => $product->id]), 'method' => 'post', 'files'=> true, 'id' => 'form2']) !!}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{trans('products::admin.option')}}</th>
                    <th>{{trans('products::admin.price')}}</th>
                </tr>
                </thead>

                <tbody>
                @if(!empty($product->options))
                    @php $skip_list = $product->options->pluck('id')->toArray(); @endphp
                @else
                    @php $skip_list = []; @endphp
                @endif
                @foreach($options as $option)
                    @if(in_array($option->id, $skip_list))
                        @php continue; @endphp
                    @endif
                    <tr>
                        <td>
                            {{Form::hidden('options['.$option->id.'][option_id]', $option->id, ['class' => 'form-control'])}}
                            {{Form::text('options['.$option->id.'][option]', $option->title, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                        </td>
                        <td>
                            {{Form::text('options['.$option->id.'][price]', '', ['class' => 'form-control'])}}
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {!! Form::submit(trans('products::admin.add'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
@push('js_scripts')
    <script>
        @foreach($product->options as $key => $val)
        $('#adminDeleteButton-{{$val->id}}').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            $.confirm({
                title: '{{trans('administration::index.confirm_delete_title')}}',
                content: '{{trans('administration::index.confirm_delete_description')}}',
                buttons: {
                    Yes: {
                        text: '{{trans('administration::index.yes')}}',
                        //btnClass: 'btn-warning',
                        action: function () {
                            $.ajax({
                                url: $this.data('href'),
                                type: 'DELETE',
                                success: function (result) {
                                    //$('#dataTableBuilder').DataTable().draw();
                                    location.reload();
                                },
                                error: function (result) {
                                    $.each(result.responseJSON, function (index, value) {
                                        toastr.error(value);
                                    });
                                }
                            });
                        }
                    },
                    No: {
                        text: '{{trans('administration::index.no')}}'
                    }
                }
            });
        });

        /*
        order save
        */
        $('.btn-row-reorder').on('row-reorder', function (e, diff, edit) {
            var data = [];
            //console.log(edit.triggerRow.data());
            $.each(diff, function (index, item) {
                buttonData = $(item.node).find('button.btn-row-reorder').data();
                if (buttonData.id == edit.triggerRow.data().id) {
                    data[index] = buttonData;
                    data[index].oldPosition = item.oldPosition;
                    data[index].newPosition = item.newPosition;
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('provision.administration.ajax.save-order')}}',
                data: {
                    'data': data
                },
                success: function (response) {
                    //няма нужда да ги зарежда отново...
                    //administrationTable.ajax.reload();
                },
                dataType: 'json'
            });
        });
        @endforeach

        // </script>
@endpush