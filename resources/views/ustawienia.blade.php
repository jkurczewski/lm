@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex">
            <div class="col-12 col-md-12 header mt-4 mb-4">
                <h1>Ustawienia</h1>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 pt-1">
                                <h5 class="col-12 mt-2 card-title fs-4 mt-2"><b>Zmień hasło</b></h5>
                                <hr/>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body pt-1 pb-3">
                                <h5 class="col-12 mt-2 card-title fs-4 mt-2"><b>Usuń konto</b></h5>
                                <hr/>
                                <form action="{{ route('user.destroy', Auth::user()->id) }}" method="post">
                                    @csrf
                                    <div class="col-6 col-lg-3">
                                        <button type="button" class="btn btn-custom-solid bg-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">Usuń konto
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1"
                                         aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="filterModalLabel">Usuń konto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6><b>Czy na pewno chcesz usunąć swoje konto?</b></h6>
                                                    <span class="text-danger">Wszystkie Twoje dane zostaną trwale usunięte!</span>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col mb-2">
                                                            <button type="submit" name="action"
                                                                    class="btn btn-custom-solid bg-danger"
                                                                    value="delete">Usuń
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button type="button" class="btn btn-custom-solid"
                                                                    data-bs-dismiss="modal">Anuluj
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
