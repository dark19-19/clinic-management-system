@extends('layouts.app')
@section('title','Log History')
@section('page.title','Log History')
@section('content')
    <div class="card" style="min-height: 62vh">
        <div class="title">
            <h4>Logs</h4>
        </div>
        <div class="content">
            <table>
                <thead>
                <tr>
                    <th>Operation Made By</th>
                    <th class="filter-head-cell">
                        <form action="{{route('log.operation.filter')}}" method="GET" class="filter-form" id="filter-form-operation">
                        @csrf
                        @method('GET')
                        <div class="form-row">
                            <select name="operation" id="filter-select-operation">
                                <option value="" selected disabled>Operation</option>
                                <option value="clear">Clear Filter</option>
                                <option value="store">Store</option>
                                <option value="update">Update</option>
                                <option value="delete">Delete</option>
                                <option value="payment">Payments</option>
                                <option value="record">Medical Records</option>
                            </select>
                        </div>
                        </form>
                    </th>
                    <th>Affected</th>
                    <th>Log Hash</th>
                    <th class="filter-head-cell">
                        <form action="{{route('log.logged.filter')}}" method="GET" class="filter-form" id="filter-form-logged">
                            @csrf
                            @method('GET')
                            <div class="form-row">
                                <select name="log" id="filter-select-logged">
                                    <option value="" selected disabled>Logged At</option>
                                    <option value="clear">Clear Filter</option>
                                    <option value="last_year">Last Year</option>
                                    <option value="last_month">Last Month</option>
                                    <option value="last_week">Last Week</option>
                                    <option value="today">Today</option>
                                    <option value="last_min">Last 10 Minutes</option>
                                </select>
                            </div>
                        </form>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{$log->operation_by}}</td>
                        <td>{{$log->operation}}</td>
                        <td>{{$log->affected}}</td>
                        <td>{{$log->log_hash}}</td>
                        <td>{{$log->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('logs-center').classList.add('active');
        document.getElementById('filter-select-operation').onchange = function () {
            document.getElementById('filter-form-operation').submit();
        };
        document.getElementById('filter-select-logged').onchange = function () {
            document.getElementById('filter-form-logged').submit();
        };
    </script>
@endsection
