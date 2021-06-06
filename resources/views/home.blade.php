@extends('layouts.app')

@section('content')
<div class="container-fluid bg-cover_home bg-home d-flex justify-content-center align-items-center">
    <div class="col-12 col-lg-10 col-lg-7 col-xl-7">

        <div class="card home">

            <div class="card-body ">
                <h1 class="card-title text-dark fs-1 header mb-4">Wyszukaj swoje nowe mieszkanie</h1>
                <form action="" method="GET">
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
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Lokalizacja miejsca docelowego <span @popper(Podaj lokalizację miejsca w którym najczęściej bywasz lub zależy Ci na dobrej komunikacji, np. szkoła, praca, dworzec kolejowy) ><x-codicon-info class="icon-info" /></span></label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="ul. Bukowska 17, Poznań">
                            <datalist id="datalistOptions">
                                @foreach ($cities as $slug => $city)
                                    <option value="{{ $city }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Max. czas podróży <span @popper(Podaj w minutach maksymalny czas dojazdu do lokalizacji docelowej) ><x-codicon-info class="icon-info"/></span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="30">
                                <span class="input-group-text" id="basic-addon2">min</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-md-3">
                        <div class="col-12 col-lg-5">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Miesięczna wysokość czynszu</label>
                            <div class="input-group">
                                <input type="number" min="100" step="100" aria-label="First name" class="form-control" placeholder="1500">
                                <span class="input-group-text">zł</span>
                                <span class="filter-price mx-3">-</span>
                                <input type="number" min="100" step="100" aria-label="First name" class="form-control " placeholder="2000">
                                <span class="input-group-text ">zł</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <label for="cities" class="form-label mb-0 mt-2 mb-md-1">Powierzchnia mieszkania</label>
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
                </form>

                <div class="row mt-4 d-flex align-items-center justify-content-end">
                    <div class="col-6 col-lg-3">
                        <button type="" class="btn btn-custom-outline" data-bs-toggle="modal" data-bs-target="#filterModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Zapisz filtr</button>
                    </div>
                    <div class="col-6 col-lg-3">
                        <button type="" class="btn btn-custom-solid" data-bs-toggle="modal" data-bs-target="#waitingModal">Szukaj</button>
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
                          <input type="text" aria-label="desc" class="form-control" placeholder="Ekonomiczna lista - Poznań">
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-custom-solid bg-danger" data-bs-dismiss="modal">Anuluj</button>
                                </div>
                                <div class="col mb-2">
                                    <button type="button" class="btn btn-custom-solid">Zapisz</button>
                                </div>
                            </div>

                        </div>
                      </div>
                    </div>
                </div>

                <div class="modal fade" id="waitingModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="waitingModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-body mt-4 mb-4">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <span class="display-4"><b>32</b></span>
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
        </div>
    </div>
</div>
<script src="{{ asset('js/cityCheck.js') }}"></script>
@endsection
