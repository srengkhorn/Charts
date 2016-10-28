@extends('charts::default')

@if(!$model->customId)
    @include('charts::_partials/titledDiv-container')
@endif

<script type="text/javascript">
var data = {
    labels: [
        @foreach($model->labels as $label)
            "{{ $label }}",
        @endforeach
    ],
    series: [
        @foreach($model->datasets as $ds)
        [
            @foreach($ds['values'] as $value)
                "{{ $value }}",
            @endforeach
        ],
        @endforeach
    ]
};

var options = { @include('charts::_partials.dimensions.js') }

new Chartist.Bar('#{{ $model->id }}', data, options);
</script>

