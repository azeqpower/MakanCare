@extends('layout.public')

@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


</head>

<h3>Your Foods</h3>

<a class="btn btn-dark mb-3" href="{{ url('/image/'.$student->id)}}">Add Food</a>
<a href="{{ url('/googleMaps') }}" class="btn btn-primary">Back</a>
<a><button type="button" class="btn btn-danger float-right mt-2" data-toggle="modal" data-target="#exampleModal" >
  <i class="fas fa-flag"></i>
</button> </a>


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
            
            @can('isAdmin')
            
            <a href="{{ url('deletes/'.$food->id) }}" class="btn btn-danger btn-sm">Delete</a>
            @endcan
            @if(Auth::id() == $food->user_id)
          
             <p>

                <a href="{{ url('deletes/'.$food->id) }}" class="btn btn-danger btn-sm">Delete</a>

        
           </p> 
      
           @endif
            
        </div>
    </div>
    @endforeach
   
 
</div>








<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report this Foodbank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetRadioButtons()">
  <span aria-hidden="true">&times;</span>
</button>
        
        </button>
      </div>
      <div class="modal-body">

      <form action="{{ url('report') }}" method="POST">
        
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="step-1">
            <label for="category-list" class="col-form-label">Select a category:</label>
            <ul id="category-list">
    @foreach($category as $category)
        <li><input type="radio" name="categories_id" value="{{ $category->id }}" class="categories_id" required>{{ $category->name }}</li>
    @endforeach
</ul>

            <button id="next-step-1" type="button" class="btn btn-secondary">Next</button>
          </div>
          <div class="step-2" style="display:none;">
            <input type="hidden" name="user_id" value="{{$current_user_id}}">
            <input type="hidden" name="marker_id" value="{{$student->id}}"> 
            <input type="text" name="description" required class="form-control">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    
    </div>
  </div>
</div>



<script>


    var categorySelected = false;

    $(document).ready(function(){
        $("input[name='categories_id']").click(function(){
            categorySelected = true;
        });

        $("#next-step-1").click(function(){
            if (!categorySelected) {
                alert("Please select a category before proceeding.");
            } else {
                $(".step-1").hide();
                $(".step-2").show();
                categorySelected = false;
            }
        });

      

    });

    document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var formData = new FormData(event.target);
    // Use the `fetch` function to submit the form data to the server via a POST request
    fetch("https://reportruz.test/marker/1", {
      method: "POST",
      body: formData
    })
    .then(function(response) {
      // Handle the response from the server
    })
    .catch(function(error) {
      // Handle any errors
    });
  });
    
    
    $('#exampleModal').on('hidden.bs.modal', function (e) {
    resetRadioButtons()
    categorySelected = false;
      $(this)
        .find("input,textarea,select")
           .val('')
           .end()
        .find(".step-2")
           .hide()
           .end()
        .find(".step-1")
           .show()
           .end();
    })

function resetRadioButtons() {
  var radioButtons = document.getElementsByName("category_id");
  for(var i = 0; i < radioButtons.length; i++) {
    radioButtons[i].checked = false;
  }
}

</script>






<style>ul {
    list-style-type: none;
}
</style>

@endsection
