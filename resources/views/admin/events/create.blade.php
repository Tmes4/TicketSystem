@extends('layouts.App')

@section('content')
<div class="wrapper">
    @include('admin.events.partials.sidebarNav')

    <div class="new-container">
        <form action="{{ route('save.event') }}" method="POST" enctype="multipart/form-data" class="new-form">

            <h4 class="new-heading">Nieuw Event</h4>

            <div class="new-form-group">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" class="new-input" value="">
            </div>

            <!-- Flex-container voor de inputvelden -->
            <div class="new-flex-container">

                <div class="new-form-group new-flex-item">
                    <label for="time">Tijd</label>
                    <input type="time" id="time" name="time" class="new-input" value="">
                </div>

                <div class="new-form-group new-flex-item">
                    <label for="date">Datum</label>
                    <input type="date" id="date" name="date" class="new-input" value="">
                </div>

            </div>

            <div class="new-flex-container">
                <div class="new-form-group new-flex-item">
                    <label for="location">Locatie</label>
                    <input type="text" id="location" name="location" class="new-input" value="">
                </div>

                <div class="new-form-group">
                    <label for="price">Prijs</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        </div>
                        <input type="number" min="0" id="price" name="price" class="new-input" value="">
                    </div>
                </div>

            </div>

            <div class="new-form-group">
                <label for="image">Afbeelding</label>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/gif" class="new-file-input">
            </div>

            <div class="new-form-group">
                <label for="description">Beschrijving</label>
                <textarea name="description" id="description" cols="30" rows="5" class="new-textarea"></textarea>
            </div>

            <button type="submit" class="new-btn">Opslaan</button>

            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
