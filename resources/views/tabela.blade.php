<div class="table-responsive-md">
<table id="table" class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Poziom światła <i class="wi wi-day-sunny" style="color: yellow"></i></th>
        <th scope="col">Temperatura  <i class="wi wi-thermometer" style="color: red"></i></th>
        <th scope="col">Wilgotność <i class="wi wi-humidity" style="color: blue"></i></th>
        <th scope="col" class="d-none d-sm-block">Data <i class="wi wi-time-3" style="color: purple"></i></th>
    </tr>
    </thead>
    <tbody>
{{--    {{ dd($logsArray[0]) }}--}}
    @foreach ($logsArray as $log)
{{--        {{dd($log->id)}}--}}
        <tr>
            <th scope="row">{{$log["id"]}}</th>
            <td>
                @if ((int)$log["Light"]>=750 && (int)$log["Light"]<=1023)
                    {{(int)$log["Light"]}} <i class="wi wi-day-sunny" style="color: yellow"></i>
                @elseif ((int)$log["Light"]>=500 && (int)$log["Light"]<750)
                    {{(int)$log["Light"]}} <i class="wi wi-day-sunny-overcast" style="color: lightsalmon"></i>
                @elseif ((int)$log["Light"]>=250 && (int)$log["Light"]<500)
                    {{(int)$log["Light"]}} <i class="wi wi-day-cloudy" style="color: orange"></i>
                @elseif((int)$log["Light"]>=0 && (int)$log["Light"]<250)
                    {{(int)$log["Light"]}} <i class="wi wi-day-cloudy-high" style="color: orangered"></i>
                @endif
            </td>
            <td>
                @if ((int)$log["Temp"]>=25 && (int)$log["Temp"]<=100)
                    {{(int)$log["Temp"]}} <i class="wi wi-celsius"> <i class="wi wi-thermometer" style="color: red"></i>
                @elseif ((int)$log["Temp"]>=20 && (int)$log["Temp"]<25)
                    {{(int)$log["Temp"]}} <i class="wi wi-celsius"> <i class="wi wi-thermometer" style="color: lightsalmon"></i>
                @elseif ((int)$log["Temp"]>=10 && (int)$log["Temp"]<20)
                    {{(int)$log["Temp"]}} <i class="wi wi-celsius"> <i class="wi wi-thermometer" style="color: lightpink"></i>
                @elseif((int)$log["Temp"]>= 0 && (int)$log["Temp"]<10)
                    {{(int)$log["Temp"]}} <i class="wi wi-celsius"> <i class="wi wi-thermometer-exterior" style="color: lightskyblue"></i>
                @endif
            </td>
            <td>
                @if ((int)$log["Hum"]>=75 && (int)$log["Hum"]<=100)
                    {{(int)$log["Hum"]}} <i class="wi wi-humidity" style="color: darkblue"></i>
                @elseif ((int)$log["Hum"]>=50 && (int)$log["Hum"]<75)
                    {{(int)$log["Hum"]}} <i class="wi wi-humidity" style="color: blue"></i>
                @elseif ((int)$log["Hum"]>=25 && (int)$log["Hum"]<50)
                    {{(int)$log["Hum"]}} <i class="wi wi-humidity" style="color: lightskyblue"></i>
                @elseif((int)$log["Hum"]>=0 && (int)$log["Hum"]<25)
                    {{(int)$log["Hum"]}} <i class="wi wi-humidity" style="color: lightcyan"></i>
                @endif
            </td>
            <td class="d-none d-sm-block">{{date('Y/d/m H:i:s', strtotime($log["created_at"]))}}</td>
        </tr>
    @endforeach
{{--    @foreach($logsArray as $item)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$item->id}}</th>--}}
{{--                    <td>{{$item->Light}}</td>--}}
{{--                    <td>{{$item->Temp}}</td>--}}
{{--                    <td>{{$item->Hum}}</td>--}}
{{--                    <td>{{date('Y/d/m H:i:s', strtotime($item->created_at))}}</td>--}}
{{--                </tr>--}}

{{--    @endforeach--}}
{{--@foreach ($logsArray as $log=>$row)--}}
{{--    <tr>--}}
{{--        <th scope="row">{{$log["id"]}}</th>--}}
{{--        <td>{{$log["Light"]}}</td>--}}
{{--        <td>{{$log["Temp"]}}</td>--}}
{{--        <td>{{$log["Hum"]}}</td>--}}
{{--        <td>{{date('Y/d/m H:i:s', strtotime($log["created_at"]))}}</td>--}}
{{--    </tr>--}}
{{--    @endforeach--}}
    </tbody>
    </table>




