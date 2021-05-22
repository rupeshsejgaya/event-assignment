@extends('app')
@section('body')
<a href = "/events"> <button type="button" class="btn btn-primary">Show Events list </button></a>

<form method="POST" action="/events">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEventTitle" class="form-label ">Event Title</label>
      <input type="text" class="form-control {{ $errors->has('message') ? ' has-error' : '' }}" name="event_title" id="exampleInputEventTitle" >
      @error('event_title')
      <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="start_date" class="form-label">Start Date</label>
      <input type="date" class="form-control {{ $errors->has('message') ? ' has-error' : '' }}"  name="start_date" id="start_date">
      @error('start_date')
      <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" class="form-control {{ $errors->has('message') ? ' has-error' : '' }}" name="end_date" id="end_date">
        @error('end_date')
        <div class="error text-danger">{{ $message }}</div>
          @enderror
    </div>
    <div class="mb-3 form-check">
        <label for="end_date" class="form-label">Recurrance</label>
        <select class="selectpicker1" name ="recurrence1">
            <option value= "every">every</option>
            <option value= "every_other">every other</option>
            <option value= "every_third">every Third</option>
            <option value= "every_fourth">every Fourth</option>
          </select>
          @error('reccurence1')
          <div class="error text-danger">{{ $message }}</div>
            @enderror
          <select class="selectpicker2" name ="recurrence2">
            <option value = "day" >Day</option>
            <option value = "week" >Week</option>
            <option value = "month" >Month</option>
            <option value = "year" >Year</option>
          </select>
          @error('reccurence2')
          <div class="error text-danger">{{ $message }}</div>
            @enderror
          </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@section('script')
<script>
</script>

@endsection
