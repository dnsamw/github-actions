@extends('layouts.frontend')

@push('careers-css')
    <link rel="stylesheet" href="{{asset('dist/css/careers.css')}}">
@endpush

@push('vacancy-css')
    <link rel="stylesheet" href="{{asset('dist/css/vacancy.css')}}">
@endpush

@section('title')
{{"Vacancy : ".$job["title"]}}
@endsection

@section('description')
{{$job["description-paras"][0]}}
@endsection

@section('content')
<div class="container" id="main">
<div class="expanding-card">

    <div class="card-content" style="background-color: white;">

        <div class="card-header">
          <div class="title">
            <a href="/careers"><i class="fas fa-arrow-circle-left"></i></a>
            <h4>{{$job["title"]}}</h4>
          </div>
          <div class="card-description">
            @foreach ($job["description-paras"] as $item)
            <p>{{$item}}</p>
            @endforeach
          </div>
        </div>

        <div class="expansion active-card">
          <div class="card-body">
            <div class="visible-area">
              <h4>Responsibilities</h4>
              <ul class="custom-bullet doodle-dot">
                @foreach ($job["responsibilities"] as $item)
                <li>{{$item}}</li>
                @endforeach
              </ul>
            </div>
          </div>

          <div class="visible-area">
            <h4>Requirements</h4>
            <ul class="custom-bullet doodle-dot">
                @foreach ($job["requirements"] as $item)
                <li>{{$item}}</li>
                @endforeach              
            </ul>
            <div class="card-footer">
              <h5></h5>
              <p></p>
              <a class="apply-btn" href="{{$job["apply_link"]}}">Apply Now</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
@endsection