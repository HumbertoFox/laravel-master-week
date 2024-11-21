@if (session('success'))
    <div class="w-100 alert alert-success text-center mt-1" role="alert">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif

@if (session('error'))
    <div class="w-100 alert alert-danger text-center mt-1" role="alert">
        <p>
            {{ session('error') }}
        </p>
    </div>
@endif

@if ($errors->any())
    <div class="w-100 alert alert-danger text-center mt-1" role="alert">
        @foreach ($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
        @endforeach
    </div>
@endif