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
                        <td> 
                            @if($event['tempat'] === 'Online Zoom')
                                {{ $event['tempat'] }}
                            @elseif($event['tempat'] === 'Online Meet')
                                {{ $event['tempat'] }}
                            @else
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $event['tempat'] }}" target="_blank">{{ $event['tempat'] }}</a>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($event['tanggal'])->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($event['waktu'])->format('H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    </div>
</section>
@endsection
