@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-cover_home d-flex justify-content-center ">
        <div class="col-12 col-md-12 header mb-4 mb-md-4">
           <h1>Twoje ulubione mieszkania</h1>
        </div>
        <div class="col-12 col-md-12">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="card h-100">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="btn btn-custom-outline active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Mapa</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="btn btn-custom-outline border-button" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Zdjecie</button>
                          </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <iframe class="card-img-top" width="100%" height="400" src="https://maps.google.com/maps?q=&output=embed&z=13"></iframe>
                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <img src="https://via.placeholder.com/406x407" alt="">
                          </div>
                        </div>
                        <div class="card-body pb-0 pt-1">
                          <h5 class="col-12 mt-2 card-title fs-5">ul.Dąbrowskiego 8, Poznań</h5>
                          <h5 class="col-12 mt-2 mb-3 card-title fs-4 fw-bold price"><b>2 457 zł/msc.</b></h5>
                        </div>

                        <div class="row px-4">
                            <hr/>
                            <div class="col-4 px-0 details-wrapper">
                              <div class="icon-details">
                                  <x-phosphor-house />
                              </div>
                              <div class="mt-2 icon-text">
                                  Metraż<br><b class="fs-5">58 m/2</b>
                              </div>
                            </div>
                            <div class="col-4 px-2 details-wrapper">
                              <div class="icon-details">
                                  <x-bx-time-five />
                              </div>
                              <div class="mt-2 icon-text">
                                  Dojazd<br><b class="fs-5">20 min</b>
                              </div>
                            </div>
                            <div class="col-4 px-0 details-wrapper">
                              <div class="icon-details">
                                  <x-fluentui-conference-room-28 />
                              </div>
                              <div class="mt-2 icon-text">
                                  Pokoje<br><b class="fs-5">4</b>
                              </div>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <a href="#" class="mt-4 btn btn-custom-solid btn-cards">Otwórz w nowej karcie</a>
                            <a href="#" class="mt-4 btn btn-heart_active"><x-clarity-heart-broken-solid /></a>
                        </div>

                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="card h-100">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="btn btn-custom-outline active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Mapa</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="btn btn-custom-outline border-button" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Zdjecie</button>
                          </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <iframe class="card-img-top" width="100%" height="400" src="https://maps.google.com/maps?q=&output=embed&z=13"></iframe>
                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <img src="https://via.placeholder.com/406x407" alt="">
                          </div>
                        </div>
                        <div class="card-body pb-0 pt-1">
                          <h5 class="col-12 mt-2 card-title fs-5">ul.Dąbrowskiego 8, Poznań</h5>
                          <h5 class="col-12 mt-2 mb-3 card-title fs-4 fw-bold price"><b>2 457 zł/msc.</b></h5>
                        </div>

                        <div class="row px-4">
                            <hr/>
                            <div class="col-4 px-0 details-wrapper">
                              <div class="icon-details">
                                  <x-phosphor-house />
                              </div>
                              <div class="mt-2 icon-text">
                                  Metraż<br><b class="fs-5">58 m/2</b>
                              </div>
                            </div>
                            <div class="col-4 px-2 details-wrapper">
                              <div class="icon-details">
                                  <x-bx-time-five />
                              </div>
                              <div class="mt-2 icon-text">
                                  Dojazd<br><b class="fs-5">20 min</b>
                              </div>
                            </div>
                            <div class="col-4 px-0 details-wrapper">
                              <div class="icon-details">
                                  <x-fluentui-conference-room-28 />
                              </div>
                              <div class="mt-2 icon-text">
                                  Pokoje<br><b class="fs-5">4</b>
                              </div>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <a href="#" class="mt-4 btn btn-custom-solid btn-cards">Otwórz w nowej karcie</a>
                            <a href="#" class="mt-4 btn btn-heart_active"><x-clarity-heart-broken-solid /></a>
                        </div>

                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="card h-100">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="btn btn-custom-outline active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Mapa</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="btn btn-custom-outline border-button" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Zdjecie</button>
                          </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <iframe class="card-img-top" width="100%" height="400" src="https://maps.google.com/maps?q=&output=embed&z=13"></iframe>
                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <img src="https://via.placeholder.com/406x407" alt="">
                          </div>
                        </div>


                        <div class="card-body pb-0 pt-1">
                          <h5 class="col-12 mt-2 card-title fs-5">ul.Dąbrowskiego 8, Poznań</h5>
                          <h5 class="col-12 mt-2 mb-3 card-title fs-4 price">2 457 zł/msc.</h5>
                        </div>

                        <div class="row px-4">
                            <hr/>
                            <div class="col-4 px-0 details-wrapper">
                              <div class="icon-details">
                                  <x-phosphor-house />
                              </div>
                              <div class="mt-2 icon-text">
                                  Metraż<br><b class="fs-5">58 m/2</b>
                              </div>
                            </div>
                            <div class="col-4 px-2 details-wrapper">
                              <div class="icon-details">
                                  <x-bx-time-five />
                              </div>
                              <div class="mt-2 icon-text">
                                  Dojazd<br><b class="fs-5">20 min</b>
                              </div>
                            </div>
                            <div class="col-4 px-0 details-wrapper">
                              <div class="icon-details">
                                  <x-fluentui-conference-room-28 />
                              </div>
                              <div class="mt-2 icon-text">
                                  Pokoje<br><b class="fs-5">4</b>
                              </div>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <a href="#" class="mt-4 btn btn-custom-solid btn-cards">Otwórz w nowej karcie</a>
                            <a href="#" class="mt-4 btn btn-heart_active"><x-clarity-heart-broken-solid /></a>
                        </div>

                      </div>
                    </div>
                  </div>
        </div>
    </div>
</div>
@endsection
