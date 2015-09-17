
@extends('layouts.layout')
@section('content')
@include('employees.menu')

    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            @if ($errors->has())
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
            @endif
                @if(Session::has('success'))
                    {{ Session::get('success') }}
                @endif
        <h1>Employee Information</h1>
                @if(isset($employees))
                    {{ Form::model($employees, ['route' => ['employees.update', $employees->id],'files' => TRUE,]) }}
                @else
                    {{ Form::open(['route'=>['employees.store'],'files' => TRUE,]) }}
                @endif
                    @include('employees._form')
                {{ Form::close() }}
        </div>
        <div class="col-md-3">

        </div>
    </div>

</div>

@stop
<!--
    {{ Form::open(['route'=>['employees.store']]) }}
        <input type="text" placeholder="First Name" class="first-name" name="first_name" required/></br>
        <input type="text" placeholder="Last name" class="last-name" name="last_name" required/></br>
        <input type="email" placeholder="Email address" class="email" name="email" required/></br>
        <input type="submit" value="Apply" />
        {{ Form::close() }} -->

