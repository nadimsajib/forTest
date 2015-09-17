
{{ Form::text('first_name',null,array('placeholder'=>'First name','class'=>'form-control')) }}<br>
{{ Form::text('last_name',null,array('placeholder'=>'Last name','class'=>'form-control')) }}<br>
@if(!isset($employees))
<!-- if some field need to hide-->
{{ Form::text('email',null,array('placeholder'=>'Email','class'=>'form-control')) }}<br>
<input class="form-control" name="photo" type="file" accept="image/*" onchange="showMyImage(this)"/>


<img  id="thumbnil"  style="width:80px; margin-top:10px;"  src="" alt="image"/><br>
@endif

{{ Form::label('','') }}



{{ Form::submit('Save', ['name' => 'submit','class'=>'btn btn-default']) }}



<script>
    function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("thumbnil");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
</script>