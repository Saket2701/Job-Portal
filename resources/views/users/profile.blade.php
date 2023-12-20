@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <section class="section-hero overlay inner-page bg-image" style="margin-top: -24px; background-image: url('{{ asset('assets/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="container">
                            @if (\Session::has('update'))
                                <div class="alert alert-success">
                                    <p>{!! \Session::get('update') !!}</p>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <a href="{{ route('edit.profile.picture') }}">
                            @if ($profile->image)
                            <img src="{{ asset('assets/images_users/' . $profile->image) }}" width="100" class="rounded-circle" alt="Profile Image">
                        @else
                            <img src="{{ asset('assets/images_users/default-pic.jpg') }}" width="100" class="rounded-circle" alt="Default Profile Image">
                        @endif
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                            <span>{{ $profile->job_title }}</span>
                            
                            <a class="btn btn-success btn-block btn-lg" href="{{ asset('assets/cvs/' . $profile->cv) }}">
                                <i class="fas fa-download"></i> Download CV
                            </a>

                            <div class="px-4 mt-1">
                                <p class="fonts">
                                    {{ $profile->bio }}
                                </p>
                            </div>

                            <div class="px-3">
                                <a href="{{ $profile->facebook }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                                <a href="{{ $profile->twitter }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                <a href="{{ $profile->Linkedin }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
