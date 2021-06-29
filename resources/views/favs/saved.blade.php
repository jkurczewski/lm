@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="col-8 mt-4 pt-4 mb-4">
            <h1>Twoje ulubione mieszkania</h1>
        </div>
        <div class="col-4 mt-4 pt-4 mb-4 d-flex justify-content-end align-items-center">
            <form action="{{ route('favs.destroyAll') }}" method="post">
                @csrf
                <button class="btn btn-danger text-white mb-3">Usuń wszystkie ulubione mieszkania</button>
            </form>
        </div>
        <div class="col-12 mt-4">
            <div class="row">
                @foreach ($favs as $item)
                    <div class="col-12 col-md-6 col-xl-4 mb-4">
                        <div class="card h-100">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-custom-outline active"
                                            id="pills-home-tab-{{ $rand.$loop->index }}" data-bs-toggle="pill"
                                            data-bs-target="#pills-home-{{ $rand.$loop->index }}" type="button"
                                            role="tab" aria-controls="pills-home-{{ $rand.$loop->index }}"
                                            aria-selected="true">Zdjęcie
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="btn btn-custom-outline border-button"
                                            id="pills-profile-tab-{{ $rand.$loop->index }}" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile-{{ $rand.$loop->index }}" type="button"
                                            role="tab" aria-controls="pills-profile-{{ $rand.$loop->index }}"
                                            aria-selected="false">Mapa
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home-{{ $rand.$loop->index }}"
                                     role="tabpanel" aria-labelledby="pills-home-tab-{{ $rand.$loop->index }}">
                                    <img src="{{ $item['photo'] }}" class="search-img" alt="">
                                </div>
                                <div class="tab-pane fade" id="pills-profile-{{ $rand.$loop->index }}"
                                     role="tabpanel" aria-labelledby="pills-profile-tab-{{ $rand.$loop->index }}">

                                    <iframe class="card-img-top" width="100%" height="350"
                                            src="https://maps.google.com/maps?q={{ $item['localization'] }}&output=embed&z=12"></iframe>
                                </div>
                            </div>
                            <div class="card-body pb-0 pt-1">
                                <h5 class="col-12 mt-2 card-title fs-6">{{ $item['localization']}}</h5>
                                <h5 class="col-12 mt-2 mb-3 card-title fs-5 fw-bold price">
                                    <b>{{ $item['price'] }}</b></h5>
                            </div>

                            <div class="row px-4">
                                <hr class="mb-2"/>
                                <div class="col px-0 details-wrapper d-flex justify-content-center">
                                    <div class="icon-details me-2">
                                        <x-phosphor-house/>
                                    </div>
                                    <div class="mt-2 icon-text">
                                        Metraż<br><b class="fs-6">{{ $item['space'] }} </b>
                                    </div>
                                </div>
                                <div class="col ps-0 pe-2 details-wrapper d-flex justify-content-center">
                                    <div class="icon-details me-2">
                                        <x-bx-time-five/>
                                    </div>
                                    <div class="mt-2 icon-text">
                                        Dojazd<br><b class="fs-6">{{ $item['time'] }} min</b>
                                    </div>
                                </div>
                                <div class="col px-0 details-wrapper d-flex justify-content-center">
                                    <div class="icon-details me-2">
                                        <x-fluentui-conference-room-28/>
                                    </div>
                                    <div class="mt-2 icon-text">
                                        Pokoje<br><b class="fs-6">{{ $item['rooms'] }}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 p-0 favs-action">
                                <a href="{{ $item['url'] }}" target="_blank"
                                   class="mt-4 btn btn-custom-solid btn-cards">Otwórz w nowej karcie</a>
                                <div>
                                    <form action="{{ route('favs.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <button href="#" class="mt-4 btn btn-heart_active deactive">
                                            <x-clarity-heart-broken-solid alt="Usuń ulubione mieszkanie"/>
                                        </button>
                                    </form>
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
