@extends('layouts.user_master')
@section('content')
<section id="services" class="services" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
        <h2>Event</h2>
        <p>Ikuti Event Kami</p>
        </div>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tempat Event</th>
                    <th>Tanggal Event</th>
                    <th>Waktu Event</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event['tempat'] }}</td>
                        <td>{{ $event['tanggal'] }}</td>
                        <td>{{ $event['waktu'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    </div>
</section>
@endsection
