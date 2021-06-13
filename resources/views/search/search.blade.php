@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center ">
        <div class="col-12 col-lg-10 col-lg-7 col-xl-7 mb-4">
            <h2 class="card-title text-dark fs-4 header mb-2 mt-4"><b>Filtry</b></h2>
            <form action="{{ url('/') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miejscowość</label>
                        <input name="localization" class="form-control @error('localization') is-invalid @enderror" list="datalistOptions" value="{{ old('localization') }}Poznań" id="exampleDataList" >
                        <datalist id="datalistOptions">
                    @foreach ($cities as $city)
                        <option value="{{ $city['slug'] }}">
                        @endforeach
                        </datalist>

                        @error('localization')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-5">
                        <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Lokalizacja miejsca docelowego <span @popper(Podaj lokalizację miejsca w którym najczęściej bywasz lub zależy Ci na dobrej komunikacji, np. szkoła, praca, dworzec kolejowy) ><x-codicon-info class="icon-info" /></span></label>
                        <input name="direction" class="form-control @error('direction') is-invalid @enderror" list="datalistOptions" value="{{ old('direction') }}ul. Dąbrowskiego 5, Poznań" id="exampleDataList" >
                        <datalist id="datalistOptions">
                    @foreach ($cities as $city)
                        <option value="{{ $city['slug'] }}">
                        @endforeach
                        </datalist>

                        @error('direction')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-3">
                        <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Max. czas podróży <span @popper(Podaj w minutach maksymalny czas dojazdu do lokalizacji docelowej) ><x-codicon-info class="icon-info"/></span></label>
                        <div class="input-group">
                <input name="direction_time" type="number" class="form-control @error('direction_time') is-invalid @enderror" value="{{ old('direction_time') }}35"  >
                <span class="input-group-text" id="basic-addon2">min</span>

                @error('direction_time')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-md-3">
                    <div class="col-12 col-lg-5">
                        <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miesięczna wysokość czynszu</label>
                        <div class="input-group">
                <input name="min_budget" type="number" min="100" step="1" value="{{ old('min_budget') }}1200" aria-label="First name" class="form-control @error('min_budget') is-invalid @enderror" >
                <span class="input-group-text">zł</span>
                <span class="filter-price mx-3">-</span>
                <input name="max_budget" type="number" min="100" step="1" value="{{ old('max_budget') }}1300" aria-label="First name" class="form-control @error('max_budget') is-invalid @enderror" >
                <span class="input-group-text ">zł</span>
                @error('min_budget')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror

                @error('max_budget')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12 col-lg-5">
                        <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Powierzchnia mieszkania</label>
                        <div class="input-group">
                <input name="min_space" type="number" min="15" step="1" value="{{ old('min_space') }}50" aria-label="First name" class="form-control @error('min_space') is-invalid @enderror">
                <span class="input-group-text">m2</span>
                <span class="filter-price mx-3">-</span>
                <input name="max_space" type="number" min="16" step="1" value="{{ old('max_space') }}60" aria-label="First name" class="form-control @error('max_space') is-invalid @enderror">
                <span class="input-group-text ">m2</span>
                @error('min_space')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('max_space')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-12 col-lg-2">
                        <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Liczba pokoi</label>
                        <div class="input-group">
                            <span class="input-group-text">Min</span>
                            <input name="rooms" type="number" min="1" step="1" value="{{ old('rooms') }}2" aria-label="First name" class="form-control @error('max_space') is-invalid @enderror">

                            @error('max_space')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-4 d-flex align-items-center justify-content-end">
                    <div class="col-6 col-lg-3">
                        <button type="button" class="btn btn-custom-outline @error('name') border border-danger border-2 text-danger @enderror" data-bs-toggle="modal" data-bs-target="#filterModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Zapisz filtr</button>
                    </div>
                    <div class="col-6 col-lg-3">
                        <button type="submit" class="btn btn-custom-solid" name="action" data-bs-toggle="modal" value="szukaj" data-bs-target="#waitingModal">Szukaj</button>
                    </div>
                </div>

                <div class="modal fade" id="filterModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="filterModalLabel">Zapisz filtr</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="desc" class="form-label mb-0 mt-2 mb-md-1">Nazwa filtru (max. 32 znaki)</label>
                                <input type="text" aria-label="desc" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ekonomiczna lista - Poznań">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-custom-solid bg-danger" data-bs-dismiss="modal">Anuluj</button>
                                    </div>
                                    <div class="col mb-2">
                                        <button type="submit" name="action" class="btn btn-custom-solid" value="zapisz">Zapisz</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="modal fade" id="waitingModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="waitingModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body mt-4 mb-4">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <span class="display-4"><b>{{ session('flats_count') }}</b></span>
                                <span class="">Znalezionych mieszkań dla Ciebie!</span>
                            </div>
                        </div>
                        <div class="slider">
                            <div class="line"></div>
                            <div class="subline inc"></div>
                            <div class="subline dec"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="m-0"/>

    <div class="container-fluid d-flex justify-content-center bg-search pt-5">
        <div class="col-12 col-lg-10 col-lg-7 col-xl-7">
            <h2 class="card-title text-dark fs-4 header mb-4">Znalezionych mieszkań dla Ciebie: <b>{{ $flats }}</b></h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($data as $flat)
                <div class="col-12 col-md-6 col-xl-4 mb-4">
                    <div class="card h-100">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="btn btn-custom-outline active" id="pills-home-tab-{{ $flat['rand'] }}" data-bs-toggle="pill" data-bs-target="#pills-home-{{ $flat['rand'] }}" type="button" role="tab" aria-controls="pills-home-{{ $flat['rand'] }}" aria-selected="true">Zdjęcie</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="btn btn-custom-outline border-button" id="pills-profile-tab-{{ $flat['rand'] }}" data-bs-toggle="pill" data-bs-target="#pills-profile-{{ $flat['rand'] }}" type="button" role="tab" aria-controls="pills-profile-{{ $flat['rand'] }}" aria-selected="false">Mapa</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-{{ $flat['rand'] }}" role="tabpanel" aria-labelledby="pills-home-tab-{{ $flat['rand'] }}">
                                <img src="{{ $flat['photo'] }}" class="search-img" alt="">
                            </div>
                            <div class="tab-pane fade" id="pills-profile-{{ $flat['rand'] }}" role="tabpanel" aria-labelledby="pills-profile-tab-{{ $flat['rand'] }}">

                                <iframe class="card-img-top" width="100%" height="350" src="https://maps.google.com/maps?q={{ $flat['localization'] }}&output=embed&z=12"></iframe>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-1">
                            <h5 class="col-12 mt-2 card-title fs-6">{{ $flat['localization']}}</h5>
                            <h5 class="col-12 mt-2 mb-3 card-title fs-5 fw-bold price"><b>{{ $flat['price'] }}</b></h5>
                        </div>

                        <div class="row px-4">
                            <hr class="mb-2"/>
                            <div class="col px-0 details-wrapper d-flex justify-content-center">
                                <div class="icon-details me-2">
                                    <x-phosphor-house />
                                </div>
                                <div class="mt-2 icon-text">
                                    Metraż<br><b class="fs-6">{{ $flat['space'] }} </b>
                                </div>
                            </div>
                            <div class="col ps-0 pe-2 details-wrapper d-flex justify-content-center">
                                <div class="icon-details me-2">
                                    <x-bx-time-five />
                                </div>
                                <div class="mt-2 icon-text">
                                    Dojazd<br><b class="fs-6">20 min</b>
                                </div>
                            </div>
                            <div class="col px-0 details-wrapper d-flex justify-content-center">
                                <div class="icon-details me-2">
                                    <x-fluentui-conference-room-28 />
                                </div>
                                <div class="mt-2 icon-text">
                                    Pokoje<br><b class="fs-6">{{ $flat['rooms'] }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <a href="{{ $flat['url'] }}" target="_blank" class="mt-4 btn btn-custom-solid btn-cards">Otwórz w nowej karcie</a>
                            <a href="#" class="mt-4 btn btn-heart_active"><x-clarity-heart-broken-solid /></a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


