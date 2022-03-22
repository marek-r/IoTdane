<!doctype html>
<html lang="pl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>--}}
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ url('css/weather-icons-wind.css') }}">
    <link rel="icon" href="{{ url('if-weather-3-2682848_90785.ico') }}" >
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

    <title>{{env('APP_NAME')}}</title>
</head>

<body class="default">
<h1 style="color: #20c997">Dane z Arduino <i class="wi wi-cloud-refresh" style="color: dodgerblue"></i> </h1>
<div id="dane"></div>

</body>
</html>

<script>
    const urlTabela = "{{ $urlTabela }}"
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    function refreshDane() {
        $.ajax({
            url: urlTabela,
            method: 'GET',
            dataType: 'html',
            success: function (wynik) {
                $('#dane').html(wynik);
            },
            complete: function () {
                setTimeout(refreshDane, 15000);
            },
        });
    }
    refreshDane();
</script>

