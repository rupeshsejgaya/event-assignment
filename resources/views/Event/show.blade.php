@extends('app')
@section('body')

<a href = "create/events"> <button type="button" class="btn btn-primary">Create Event</button></a>
<a href = "/events"> <button type="button" class="btn btn-primary">Show Events list </button></a>

<br/>
<br/>
<br/>
<dl class="row">
  <dt class="col-sm-3">Event Title</dt>
  <dd class="col-sm-9">{{isset($event) ?  $event->event_title :''}}</dd>
  <dt class="col-sm-3">Event Occurrence</dt>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Day Name</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($result))
        @foreach($result as $key => $res)
      <tr>
        <th scope="row">{{$key + 1}} </th>
        <td> {{$res->date }} </td>
        <td>{{$res->day_name }} </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  <dt class="col-sm-3">	Total Recurrence Event: </dt>
  <dd class="col-sm-9">{{isset($total) ?  $total :''}}</dd>
@endsection
@section('script')
<script>
</script>

@endsection
