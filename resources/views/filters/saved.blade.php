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
                            <h5 class="col-12 mt-2 card-title fs-5">Lokalizacja: <b>{{ $filter->localization }}</b></h5>
                            <h5 class="col-12 mt-2 card-title fs-5">Od <b>{{ $filter->min_budget }} zł/msc.</b> do <b>{{ $filter->max_budget }} zł/msc.</b></h5>
                            <h5 class="col-12 mt-2 card-title fs-5">Powierzchnia: <b>{{ $filter->min_space }} m2</b> - <b>{{ $filter->max_space }}m2</b></h5>
                            <h5 class="col-12 mt-2 card-title fs-5">Pokoje: <b>min. {{ $filter->rooms }}</b></h5>
                            <h5 class="col-12 mt-2 mb-3 card-title fs-5">W odległości od <b>{{ $filter->direction }}</b> do <b>{{ $filter->direction_time }} min</b> </h5>
                            <hr/>
                            <div class="row">
                                <div class="col-8">
                                    <a href="#" class="btn btn-custom-solid h-20 ">Otwórz w nowej karcie</a>
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
    </div>
</div>
@endsection
