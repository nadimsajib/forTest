@extends('layouts.layout')
@section('content')
    @include('employees.menu')
<h1>Employee management system</h1>

<h3>Employees List</h3>
    @if(Session::has('success'))
       <p class="">{{ Session::get('success') }}</p>
    @endif
<h4 style="float: right; margin-right: 30px"><a href="{{ URL::route('employees.create')}}">Add</a></h4>
<table class="table table-striped">
    <thead>
    <tr>
        <td>Id</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Photo</td>
        <td>Action</td>
    </tr>
    </thead>
@foreach($employees_all as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->first_name}}</td>
            <td>{{$value->last_name}}</td>
            <td>{{$value->email}}</td>
            <td>{{HTML::image($value->photo, $value->first_name, array('width'=>'80px'))}}</td>
            <td><a href="{{ URL::route('employees.edit', $value->id) }}" title="Modify">Edit</a> &nbsp;
                <a href="{{ URL::route('employees.destroy', $value->id) }}" title="Delete" onclick="return confirm('Are you sure to Delete?')">Delete</a>
            </td>
        </tr>
    @endforeach
</table>

@stop




