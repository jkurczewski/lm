@extends('layouts.app')

@section('content')
<div class="container-fluid bg-cover_home bg-home d-flex justify-content-center align-items-center">
    <div class="col-12 col-lg-10 col-lg-7 col-xl-7">
        <div class="card home">
            <div class="card-body ">
                <h1 class="card-title header">Wyszukaj swoje nowe mieszkanie</h1>
                <hr/>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miejscowość</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Poznań">
                            <datalist id="datalistOptions">
                                @foreach ($cities as $slug => $city)
                                    <option value="{{ $city }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-12 col-lg-5">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Lokalizacja miejsca pracy</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="ul. Bukowska 17, Poznań">
                            <datalist id="datalistOptions">
                                @foreach ($cities as $slug => $city)
                                    <option value="{{ $city }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Max. czas podróży</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="30">
                                <span class="input-group-text" id="basic-addon2">min</span>
                              </div>
                        </div>
                    </div>
                    <div class="row mt-md-3">
                        <div class="col-12 col-lg-5">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miesięczny wysokość czynszu</label>
                            <div class="input-group">
                                <input type="number" min="100" step="100" aria-label="First name" class="form-control">
                                <span class="input-group-text">Min</span>
                                <span class="filter-price mx-3">-</span>
                                <input type="number" min="100" step="100" aria-label="First name" class="form-control ">
                                <span class="input-group-text ">Max</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Powierznia mieszkania</label>
                            <div class="input-group">
                                <input type="number" min="15" step="1" aria-label="First name" class="form-control">
                                <span class="input-group-text">m2</span>
                                <span class="filter-price mx-3">-</span>
                                <input type="number" min="16" step="1" aria-label="First name" class="form-control ">
                                <span class="input-group-text ">m2</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Liczba pokoi</label>
                            <div class="input-group">
                                <span class="input-group-text">Min</span>
                                <input type="number" min="1" step="1" aria-label="First name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center justify-content-end">
                        <div class="col-6 col-lg-3">
                            <button type="submit" class="btn btn-custom-outline">Zapisz filtr</button>
                        </div>
                        <div class="col-6 col-lg-3">
                            <button type="submit" class="btn btn-custom-solid">Szukaj</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/cityCheck.js') }}"></script>
@endsection
