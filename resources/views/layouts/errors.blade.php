@if ($errors->any())
    <br />
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error) {{ $error }} <br /> @endforeach
    </div>
@endif
