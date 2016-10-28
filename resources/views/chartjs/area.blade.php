@extends('charts::default')

@if(!$model->customId)
    @include('charts::_partials.canvas2-container')
@endif

<script type="text/javascript">
var ctx = document.getElementById("{{ $model->id }}")
var data = {
    labels: [
        @foreach($model->labels as $label)
            "{{ $label }}",
        @endforeach
    ],
    datasets: [{
        fill: true,
        @if($model->colors)
            backgroundColor: "{{ $model->colors[0] }}",
        @endif
        label: "{{ $model->element_label }}",
        lineTension: 0.3,
        @if($model->colors)
            borderColor: "{{ $model->colors[0] }}",
        @endif
        data: [
            @foreach($model->values as $dta) {
                "{{ $dta }}",
            }
        ],
    }]
};

var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        responsive: ($model->responsive or !$model->width) ? 'true' : 'false',
        maintainAspectRatio: false,
        title: {
            display: true,
            text: "{{ $model->title }}",
            fontSize: 20,
        }
    }
});
</script>

