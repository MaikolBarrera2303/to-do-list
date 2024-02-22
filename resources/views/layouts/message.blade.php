@if(session("error"))
    <div class="alert alert-danger" role="alert">
        {{ session("error") }}
    </div>
@endif

@if(session("success"))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
@endif

@error("title")
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror

@error("description")
<div class="alert alert-warning" role="alert">
    {{ $message }}
</div>
@enderror

@error("current_password")
<div class="alert alert-warning" role="alert">
    {{ $message }}
</div>
@enderror

@error("password")
<div class="alert alert-warning" role="alert">
    {{ $message }}
</div>
@enderror

@error("name")
<div class="alert alert-warning" role="alert">
    {{ $message }}
</div>
@enderror

@error("email")
<div class="alert alert-warning" role="alert">
    {{ $message }}
</div>
@enderror
