@extends('app')
@section('body')
<a href = "create/events"> <button type="button" class="btn btn-primary">Create Event</button></a>

@if(isset($success))
    <div class="alert alert-success">
        <strong>Success!</strong>{{$success}}
      </div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Event Title</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date </th>
        <th scope="col">Ocurrence </th>
      </tr>
    </thead>
    <tbody>
        @if(isset($events))
        @foreach($events as $key => $event)
      <tr>
        <th scope="row">{{$key + 1}} </th>
        <td> {{$event->event_title }} </td>
        <td>{{$event->start_date }} </td>
        <td>{{$event->end_date }}</td>
        <td>{{$event->recurrence1}} {{ $event->recurrence2 }}</td>
        <td> <a href ="/events/{{$event->id}}" ><button> view </button> </a></td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
@endsection
@section('script')
<script>
</script>

@endsection
