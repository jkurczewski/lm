@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-cover_home bg-home d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-10 col-lg-7 col-xl-7">

            <div class="card home">

                <div class="card-body ">
                    <h1 class="card-title text-dark fs-1 header mb-4">Wyszukaj swoje nowe mieszkanie</h1>
                    <form action="{{ url('/') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miejscowość</label>
                                <input name="localization"
                                       class="form-control @error('localization') is-invalid @enderror"
                                       list="datalistOptions" value="{{ old('localization') }}Poznań"
                                       id="exampleDataList">
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
                                <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Lokalizacja miejsca docelowego
                                    <span @popper(Podaj lokalizację miejsca w którym najczęściej bywasz lub zależy Ci na
                                          dobrej komunikacji, np. szkoła, praca, dworzec kolejowy)><x-codicon-info
                                                class="icon-info"/></span></label>
                                <input name="direction" class="form-control @error('direction') is-invalid @enderror"
                                       list="datalistOptions" value="{{ old('direction') }}ul. Dąbrowskiego 5, Poznań"
                                       id="exampleDataList">
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
                                <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Max. czas podróży <span
                                            @popper(Podaj w minutach maksymalny czas dojazdu do lokalizacji docelowej)><x-codicon-info class="icon-info"/></span></label>
                                <div class="input-group">
                                    <input name="direction_time" type="number"
                                           class="form-control @error('direction_time') is-invalid @enderror"
                                           value="{{ old('direction_time') }}35">
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
                                <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miesięczna wysokość
                                    czynszu</label>
                                <div class="input-group">
                                    <input name="min_budget" type="number" min="100" step="100"
                                           value="{{ old('min_budget') }}1200" aria-label="First name"
                                           class="form-control @error('min_budget') is-invalid @enderror">
                                    <span class="input-group-text">zł</span>
                                    <span class="filter-price mx-3">-</span>
                                    <input name="max_budget" type="number" min="100" step="100"
                                           value="{{ old('max_budget') }}1300" aria-label="First name"
                                           class="form-control @error('max_budget') is-invalid @enderror">
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
                                    <input name="min_space" type="number" min="15" step="1"
                                           value="{{ old('min_space') }}50" aria-label="First name"
                                           class="form-control @error('min_space') is-invalid @enderror">
                                    <span class="input-group-text">m2</span>
                                    <span class="filter-price mx-3">-</span>
                                    <input name="max_space" type="number" min="16" step="1"
                                           value="{{ old('max_space') }}60" aria-label="First name"
                                           class="form-control @error('max_space') is-invalid @enderror">
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
                                    <input name="rooms" type="number" min="1" step="1" value="{{ old('rooms') }}2"
                                           aria-label="First name"
                                           class="form-control @error('max_space') is-invalid @enderror">

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
                                <button type="button"
                                        class="btn btn-custom-outline @error('name') border border-danger border-2 text-danger @enderror"
                                        data-bs-toggle="modal" data-bs-target="#filterModal" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Tooltip on top">Zapisz filtr
                                </button>
                            </div>
                            <div class="col-6 col-lg-3">
                                <button type="submit" class="btn btn-custom-solid" name="action" data-bs-toggle="modal"
                                        value="szukaj" data-bs-target="#waitingModal">Szukaj
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="filterModal" data-bs-backdrop="static" tabindex="-1"
                             aria-labelledby="filterModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="filterModalLabel">Zapisz filtr</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="desc" class="form-label mb-0 mt-2 mb-md-1">Nazwa filtru (max. 32
                                            znaki)</label>
                                        <input type="text" aria-label="desc" name="name" value="{{ old('name') }}"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Ekonomiczna lista - Poznań">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="btn btn-custom-solid bg-danger"
                                                        data-bs-dismiss="modal">Anuluj
                                                </button>
                                            </div>
                                            <div class="col mb-2">
                                                <button type="submit" name="action" class="btn btn-custom-solid"
                                                        value="zapisz">Zapisz
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>


                    <div class="modal fade" id="waitingModal" data-bs-backdrop="static" tabindex="-1"
                         aria-labelledby="waitingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body mt-4 mb-4">
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <span id="flats"
                                              class="display-4"><b>{{ Session::get('flats_count') }}</b></span>
                                        <span class="">Znalezionych mieszkań dla Ciebie!</span>
                                        <span class="small text-secondary">Zrelaksuj się, proces poszukowania może potrwać kilka minut.</span>
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
        </div>
    </div>
    </div>
@endsection
