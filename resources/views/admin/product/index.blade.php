
@extends('layouts.admin')
@section('main')
<body>
  <div class="container">
    <table class="table table-striped table-inverse ">
      <h2 style="text-align:center">Danh mục category</h2>
     
      <thead class="thead-inverse">
        <tr>
          <th>STT</th>
          <th>Tên</th>
          <th>Ảnh</th>
          <th>Giá</th>
          <th>Giá KM</th>
          <th>Danh mục</th>
          <th style="width:200px ">Nội dung</th>
          <th>Hành động</th>
          
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
    
        @foreach ($data as $dt)
        <tr>
          <td>{{$dt->id}}</td>
          <td>{{$dt->name}}</td>
          <td>
            <img src="{{url('public/uploads')}}/{{$dt->image}}" alt="" width="100" height="100">
            </td>
          <td>{{$dt->price}}</td>
          <td>
            
            {{$dt->sale_price}}</td>
          <td>{{$dt->category_id}}</td>
          <td>{{$dt->content}}</td>
          <td>{{$dt->status == 1 ? 'Hiện' : 'Ẩn'}}</td> 
          <td>
            <form action="{{route('product.destroy',$dt->id)}}" method="post">
              @csrf @method('delete')
              <a class="btn btn-primary" href="{{route('product.edit',$dt->id)}}">Sửa</a>
              <button onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger">Xóa</button>
            </form>
        
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
    <a href="{{ route('product.create')}}" class="btn btn-primary"> Thêm mới</a>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

@stop()