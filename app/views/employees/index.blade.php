<h1>Employee management system</h1>
@if(Session::has('success'))
    {{ Session::get('success') }}
@endif
<h3>Employees List</h3>
<h4><a href="{{ URL::route('employees.create')}}">Add</a></h4>
<table border="1">
    <thead>
    <tr>
        <td>Id</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Action</td>
    </tr>
    </thead>
@foreach($employees_all as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->first_name}}</td>
            <td>{{$value->last_name}}</td>
            <td>{{$value->email}}</td>
            <td><a href="{{ URL::route('employees.edit', $value->id) }}" title="Modify">Edit</a> &nbsp;
                <a href="{{ URL::route('employees.destroy', $value->id) }}" title="Delete" onclick="return confirm('Are you sure to Delete?')">Delete</a>
            </td>
        </tr>
    @endforeach
</table>






