<!DOCTYPE html>
<meta charset="UTF-8">
<title>Student application</title>
</html>
<body>
<h5>Student Information</h5>
{{ Form::open(['route'=>['student.store']]) }}
<input type="text" placeholder="Student Name" id="student_name" name="student_name" required/></br>
<input type="text" placeholder="Student Address" id="student_address" name="student_address" required/></br>
<input type="email" placeholder="Student email" id="student_email" name="student_email" required/></br>
<input type="submit" value="Apply" />
{{ Form::close() }}
</body>
