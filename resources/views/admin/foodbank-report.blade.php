@extends('layout.public')

@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>




<a href="{{ url('/googleMaps') }}" class="btn btn-primary" >Back</a>
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <h1>Manage Report</h1>

            <a href="{{ url('/admin/history-report') }}" class="btn btn-success" style="float: right; margin-bottom: 20px;">View History</a>
        


            <table class="table table-bordered">

                <thead>

                    <th width="80px">Report ID</th>

                    <th>Marker</th>
                    <th>Email, Phone</th>
                    <th>Desc.</th>
                    <th width="100px">Status</th>
                    <th width="200px">Action</th>

                </thead>

                <tbody>

                @foreach($foodbankRequests as $post)

                <tr>

                    <td>{{ $post->id }}</td>

                    <td>{{ $post->marker_id }}</td>
                    <td>{{ $post->email }}, {{ $post->phone }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->status }}</td>

                    <td>

                    <div class="button-container">
                                    @if($post->status === 'approved')
                    <button class="btn btn-success" disabled>SOLVED</button>
                @else
                    <form action="{{ route('foodbank.solve', $post->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success">SOLVE</button>
                    </form>
    
                @endif
                </div>
            
                       <style>.button-container {
    display: flex;
    justify-content: space-between;
}</style>
                        
                    </td>
    
                </tr>

                @endforeach

                </tbody>

   

            </table>

        </div>

    </div>

</div>

</style> 
@if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
@endif


@endsection
