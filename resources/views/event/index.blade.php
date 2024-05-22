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
                {{-- @foreach ($events as $event) --}}
                    <tr>
                        <td>1</td>
                        <td>Jalan Lingkar</td>
                        <td>20 Mei 2024</td>
                        <td>15.00</td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
        
    </div>
    </div>
</section>
@endsection
