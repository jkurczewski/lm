@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex">
            <div class="col-12 col-md-12 header mt-4 mb-4">
                <h1>Twoje filtry wyszukiwania</h1>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                    @foreach ($filters as $filter)
                        <div class="col-12 col-md-6 col-lg-4 h-100">
                            <div class="card">
                                <div class="card-body pb-0 pt-1">
                                    <h5 class="col-12 mt-2 card-title fs-4 mt-2"><b>{{ $filter->name }}</b></h5>
                                    <hr/>
                                    <h5 class="col-12 mt-2 card-title fs-5">Lokalizacja:
                                        <b>{{ $filter->localization }}</b></h5>
                                    <h5 class="col-12 mt-2 card-title fs-5">Od <b>{{ $filter->min_budget }} zł/msc.</b>
                                        do <b>{{ $filter->max_budget }} zł/msc.</b></h5>
                                    <h5 class="col-12 mt-2 card-title fs-5">Powierzchnia: <b>{{ $filter->min_space }}
                                            m2</b> - <b>{{ $filter->max_space }}m2</b></h5>
                                    <h5 class="col-12 mt-2 card-title fs-5">Pokoje: <b>min. {{ $filter->rooms }}</b>
                                    </h5>
                                    <h5 class="col-12 mt-2 mb-3 card-title fs-5">W odległości od
                                        <b>{{ $filter->direction }}</b> do <b>{{ $filter->direction_time }} min</b></h5>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-8">
                                            <form action="{{ url('/')  }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$filter->localization}}"
                                                       name="localization">
                                                <input type="hidden" value="{{ $filter->min_budget }}"
                                                       name="min_budget">
                                                <input type="hidden" value="{{ $filter->max_budget }}"
                                                       name="max_budget">
                                                <input type="hidden" value="{{ $filter->min_space }}" name="min_space">
                                                <input type="hidden" value="{{ $filter->max_space }}" name="max_space">
                                                <input type="hidden" value="{{ $filter->rooms }}" name="rooms">
                                                <input type="hidden" value="{{ $filter->direction }}" name="direction">
                                                <input type="hidden" value="{{ $filter->direction_time }}"
                                                       name="direction_time">
                                                <button class="btn btn-custom-solid h-20" data-bs-toggle="modal"
                                                        name="action" value="szukaj" data-bs-target="#waitingModal">
                                                    Wczytaj zapisany filtr
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-4">
                                            <form action="{{ route('filters.destroy', $filter->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-danger w-100 text-white mb-3">Usuń</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal fade" id="waitingModal" data-bs-backdrop="static" tabindex="-1"
                 aria-labelledby="waitingModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body mt-4 mb-4">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <span id="flats" class="display-4"><b>{{ Session::get('flats_count') }}</b></span>
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
@endsection
