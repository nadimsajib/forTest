<div style="width: 40%; margin: 0 auto;">
    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

<h1>Employee Information</h1>
        <!--
    {{ Form::open(['route'=>['employees.store']]) }}
    <input type="text" placeholder="First Name" class="first-name" name="first_name" required/></br>
    <input type="text" placeholder="Last name" class="last-name" name="last_name" required/></br>
    <input type="email" placeholder="Email address" class="email" name="email" required/></br>
    <input type="submit" value="Apply" />
    {{ Form::close() }} -->
        @if(isset($employees))
            {{ Form::model($employees, ['route' => ['employees.update', $employees->id]]) }}
        @else
            {{ Form::open(['route'=>['employees.store']]) }}
        @endif

        {{ Form::text('first_name',null,array('placeholder'=>'First name')) }}<br>
        {{ Form::text('last_name',null,array('placeholder'=>'Last name')) }}<br>
        {{ Form::text('email',null,array('placeholder'=>'Email')) }}<br>
        {{-- More fields... --}}
        {{ Form::submit('Save', ['name' => 'submit']) }}
        {{ Form::close() }}
</div>

