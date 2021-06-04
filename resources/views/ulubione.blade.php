@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-cover_home d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-10 ">

        </div>
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="card h-100">
                        <iframe class="card-img-top" width="100%" height="400" src="https://maps.google.com/maps?q=&output=embed&z=13"></iframe>
                        <div class="card-body pb-0">
                          <h5 class="col-12 mt-2 card-title fs-5">ul.Dąbrowskiego 8, Poznań</h5>
                          <h5 class="col-12 mt-2 mb-3 card-title fs-4 fw-bold price"><b>2 457 zł/msc.</b></h5>
                        </div>

                        <div class="row px-4">
                            <hr/>
                            <div class="col-4 px-0">
                                <div class="row">
                                    <div class="icon-details col-12 px-0">
                                        <x-phosphor-house />
                                    </div>
                                    <div class="mt-2 icon-text col-12 px-0">
                                        Metraż<br><b class="fs-5">58 m/2</b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 px-0">
                                <div class="row">
                                    <div class="icon-details col-12 px-0">
                                        <x-bx-time-five />
                                    </div>
                                    <div class="mt-2 icon-text col-12 px-0">
                                        Dojazd<br><b class="fs-5">20 min</b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 px-0">
                                <div class="row">
                                    <div class="icon-details col-12 px-0">
                                        <x-fluentui-conference-room-28 />
                                    </div>
                                    <div class="mt-2 icon-text col-12 px-0">
                                        Pokoje<br><b class="fs-5">4</b>
                                    </div>
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
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a short card.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
