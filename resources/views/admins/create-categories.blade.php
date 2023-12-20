@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Categories</h5>
                    <form method="POST" action="{{ route('store.categories') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Category Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" />
                            @if($errors->has('name'))
                                <p class="alert alert-success">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
