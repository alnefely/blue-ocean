@extends('layout.backend.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mb-4 col-md-12">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Statistics</h5>
                {{-- <small class="text-muted">Updated 1 month ago</small> --}}
            </div>
            <div class="card-body pt-2">
                <div class="row gy-3">

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="fa-solid fa-2x fa-plane"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">55</h5>
                                <small>Test</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                <i class="fa-regular fa-2x fa-circle-check"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">55</h5>
                                <small>Test</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                <i class="fa-regular fa-2x fa-comments"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">55</h5>
                                <small>Test</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2">
                                <i class="fa-regular fa-2x fa-file-lines"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">55</h5>
                                <small>Test</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
