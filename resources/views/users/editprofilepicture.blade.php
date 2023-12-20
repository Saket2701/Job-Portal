@extends('layouts.app')

@section('content')
<section class="section-hero overlay inner-page bg-image" style="margin-top: -24px; background-image: url('{{ asset('assets/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Edit Profile Picture</h1>
                <div class="custom-breadcrumbs">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Edit Profile Picture</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    @if (\Session::has('update'))
        <div class="alert alert-success">
            <p>{!! \Session::get('update') !!}</p>
        </div>
    @endif
</div>

<section class="site-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2>Edit Profile Picture</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <form action="{{ route('update.profile.picture') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center mb-4">
                        @if ($profile->image)
                            <img src="{{ asset('assets/images_users/' . $profile->image) }}" width="100" class="rounded-circle" alt="Profile Image">
                        @else
                            <img src="{{ asset('assets/images_users/default-pic.jpg') }}" width="100" class="rounded-circle" alt="Default Profile Image">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Select a new profile picture:</label>
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile Picture</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
