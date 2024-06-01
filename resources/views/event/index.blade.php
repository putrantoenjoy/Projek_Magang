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
                    <th>Nama Event</th>
                    <th>Tempat Event</th>
                    <th>Tanggal Mulai Event</th>
                    <th>Tanggal Akhir Event</th>
                    <th>Waktu Event</th>
                    <th>Status Event</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->nama }}</td>
                        <td> 
                            @if($event['tempat'] === 'Online Zoom')
                                {{ $event['tempat'] }}
                            @elseif($event['tempat'] === 'Online Meet')
                                {{ $event['tempat'] }}
                            @else
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $event['tempat'] }}" target="_blank">{{ $event['tempat'] }}</a>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($event['tanggal_mulai'])->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($event['tanggal_akhir'])->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->waktu_akhir)->format('H:i') }}</td>
                        <td>{{ $event->eventstatus->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $events->links() }}
        </div>
    </div>
    </div>
</section>
@endsection
