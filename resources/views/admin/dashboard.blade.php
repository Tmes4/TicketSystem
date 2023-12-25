@extends('layouts.app')

@section('content')

<div class="wrapper">
    @include('admin.events.partials.sidebarNav')

    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <div class="row row-cols-1 row-cols-md-3 g-3 mx-3">
                    <div class="col">
                        <div class="card">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Welcome</h5>
                                @auth
                                <p class="small">{{ auth()->user()->name }}</p>
                                @endauth
                                <div class="row text-center">
                                    <!-- <div class="col">FULL NAME <span class="d-block">Admin</span></div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
<script src="script.js"></script>
@endsection