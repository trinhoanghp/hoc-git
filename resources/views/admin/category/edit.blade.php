

 @extends('layouts.admin') 
 @section('main')
  </head>
  
  <body>
  <div class="container">

 
  <form action="{{route('category.update',$category)}}" method="post">
      @csrf @method('PUT')
      <div class="form-group">
        <h1 style="text-align:center" >Form sửa mới</h1>
        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Nhập tên" value="{{$category->name}}">
        
        <input type="radio" name="status" id="" value="1" {{ $category->status == 1 ? 'checked': ''}}> Hiện
        <input type="radio" name="status" id="" value="0"{{ $category->status == 0? 'checked': ''}}> Ẩn
      </div>
      <button class="btn btn-primary" type="submit">Summit</button>
    </form>
    @if ($errors->all())
  <div class="alert alert-danger" role="alert">
   
      
        @foreach($errors->all() as $err)
        <strong>{{$err}}</strong>
        @endforeach
     
     
    </div>
    @endif
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
@stop()