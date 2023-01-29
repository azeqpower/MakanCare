@extends('layout.public')

@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>

<h3>Your Foods</h3>

<a class="btn btn-dark mb-3" href="{{ url('/image/'.$student->id)}}">Add Food</a>
<a href="{{ url('/googleMaps') }}" class="btn btn-primary">Back</a>

<div class="card-columns">
    @foreach($foods as $food)
    
    <div class="card">
    <!-- <img src="{{ asset('storage/image/'.$food->image) }}" alt="image"> -->
        <div class="card-body">
        <h4><img src="{{ asset('public/storage/image/'.$food->image) }}" width="300" height="300"></h4> 
        
            <h4 class="card-title">{{ $food->food_name }}</h4>
            <!-- <p class="card-text">{{ $food->food_description }}</p> -->
            <p class="card-text">Category: {{ $food->category?->name}}</p>
            <p class="card-text">Email: {{ $food->user?->email}}</p>
        
            <!-- <p class="card-text">Best Before: {{ $food->best_before }}</p>-->
            
            
            @if(Auth::id() == $food->user_id)

             <p>
                <a href="{{ url('edit/'.$food->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url('deletes/'.$food->id) }}" class="btn btn-danger btn-sm">Delete</a>

        
           </p> 
           @endif
            
        </div>
    </div>
    @endforeach
   
 
</div>




<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report this Foodbank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Select Report Category:</label>
            @foreach($category as $category)
            <ul>
              <li><input type="radio" name="category_id" value="{{ $category->id }}">{{ $category->name }}</li>
            </ul>
            @endforeach
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
        $("#report-button").click(function(event) {
            event.preventDefault();
            $('#report-form').show();
        });
        $("#report-form").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '/report',
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert("Form submitted!");
                    $('#report-form').hide();
                }
            });
        });
    });
</script>



<style>ul {
    list-style-type: none;
}
</style>

@endsection
