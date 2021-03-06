<table style="border-color: #000000; border-style: solid;">
    <thead>
    <tr>
        <th colspan="10" style="vertical-align: middle; text-align: center;">
            <strong>Claim Summary Report</strong>
        </th>
    </tr>
    <tr>
        <td colspan="10">&nbsp;</td>
    </tr>
    <tr>
        <th colspan="10">
            <strong>Network Operator: </strong>
        </th>
    </tr>
    <tr>
        <th colspan="10">
            <strong>Network Area: </strong>
        </th>
    </tr>
    <tr>
        <th colspan="10">
            <strong> Reporting Period: {{ $dateFrom }} - {{ $dateTo }} </strong>
        </th>
    </tr>
    <tr>
        <th colspan="10">
            <strong>Date Printed: {{ Carbon\Carbon::now() }}</strong>
        </th>
    </tr>
    </thead>

    <tbody>
    @foreach($reports as $key => $reportValue)
        @if(array_key_exists("allRoute",$reportValue))
            @foreach($reportValue['allRoute'] as $key1 => $allRoutes)
                @php $existTrip = false; @endphp
                @foreach($allRoutes as $key2 => $dataPerDate)
                    @if($key2=='total_per_route')
                        @if($existTrip==true)
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <strong>Total for Route: {{$key1}}</strong>
                            </td>
                            @foreach($allRoutes['total_per_route'] as $key4 => $totalPerRoute)
                                <td><strong>{{$totalPerRoute}}</strong></td>
                            @endforeach
                        </tr>
                        @endif
                    @endif
                    @if(!empty($dataPerDate['inbound_data']) || !empty($dataPerDate['inbound_data']))
                        @php $existTrip = true; @endphp
                        <tr>
                            <td colspan="10">&nbsp;</td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="text-align: center;"><strong>Route No.</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>OD</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Service Date</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Trip Planned</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Trip Made</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Service Planned (KM)</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Service Served (KM)</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Claim</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Travel (KM) GPS</strong></td>
                            <td rowspan="2" style="text-align: center;"><strong>Total Claim GPS</strong></td>
                        </tr>

                        @if(!empty($dataPerDate['inbound_data']))
                            <tr><span>WHAT IS THIS BEHAVIOUR!!</span></tr>
                            <tr>
                                <td style="text-align: center;">{{ $key1 }}</td>
                                <td style="text-align: center;">{{ $dataPerDate['inbound_data']['route_name']  }}</td>
                                <td style="text-align: center;">{{ $key2 }}</td>
                                <td>{{ $dataPerDate['inbound_data']['trip_planned_in'] }}</td>
                                <td>{{ $dataPerDate['inbound_data']['trip_made_in']  }}</td>
                                <td>{{ $dataPerDate['inbound_data']['service_planned_in']  }}</td>
                                <td>{{ $dataPerDate['inbound_data']['service_served_in']  }}</td>
                                <td>{{ $dataPerDate['inbound_data']['travel_gps_in']   }}</td>
                                <td>{{ $dataPerDate['inbound_data']['claim_in']  }}</td>
                                <td>{{ $dataPerDate['inbound_data']['claim_gps_in'] }}</td>
                            </tr>
                        @endif
                        @if(!empty($dataPerDate['outbound_data']))
                            <tr>
                                <td style="text-align: center;">{{ $key1 }}</td>
                                <td style="text-align: center;">{{ $dataPerDate['outbound_data']['route_name']  }}</td>
                                <td style="text-align: center;">{{ $key2 }}</td>
                                <td>{{ $dataPerDate['outbound_data']['trip_planned_out'] }}</td>
                                <td>{{ $dataPerDate['outbound_data']['trip_made_out']  }}</td>
                                <td>{{ $dataPerDate['outbound_data']['service_planned_out']  }}</td>
                                <td>{{ $dataPerDate['outbound_data']['service_served_out']  }}</td>
                                <td>{{ $dataPerDate['outbound_data']['travel_gps_out']   }}</td>
                                <td>{{ $dataPerDate['outbound_data']['claim_out']  }}</td>
                                <td>{{ $dataPerDate['outbound_data']['claim_gps_out'] }}</td>
                            </tr>
                        @endif
                        @if(!empty(($dataPerDate['total_per_date'])))
                            <tr>
                                <td colspan="3" style="text-align: right;">
                                    <strong>Total for Service Date: {{$key2}}</strong>
                                </td>
                                @foreach($dataPerDate['total_per_date'] as $key3 => $totalPerDate)
                                    <td><strong>{{$totalPerDate}}</strong></td>
                                @endforeach
                            </tr>
                        @endif

                    @endif
                @endforeach
                {{--@if(array_key_exists("total_per_route",$allRoutes))
                    @if(!empty(($allRoutes['total_per_route'])))
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <strong>Total for Route: {{$key1}}</strong>
                            </td>
                            @foreach($allRoutes['total_per_route'] as $key4 => $totalPerRoute)
                                <td><strong>{{$totalPerRoute}}</strong></td>
                            @endforeach
                        </tr>
                    @endif
                @endif--}}
            @endforeach
        @endif
        @if(array_key_exists("grand",$reportValue))
            @if(!empty(($reportValue['grand'])))
                <tr>
                    <td colspan="3" style="text-align: right;">
                        <strong>Grand Total:</strong>
                    </td>
                    @foreach($reportValue['grand'] as $key5 => $grandValue)
                        <td><strong>{{$grandValue}}</strong></td>
                    @endforeach
                </tr>
            @endif
        @endif
    @endforeach
    </tbody>
</table>
