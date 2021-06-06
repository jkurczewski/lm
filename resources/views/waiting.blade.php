@extends('layouts.app')

@section('content')
<div class="container-fluid bg-cover_home bg-home d-flex justify-content-center align-items-center">
    <div class="col-12 col-lg-10 col-lg-7 col-xl-7">

        <div class="card home">

            <div class="card-body ">
                <h1 class="card-title text-dark fs-1 header mb-4">Wyszukaj swoje nowe mieszkanie</h1>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/cityCheck.js') }}"></script>
@endsection
