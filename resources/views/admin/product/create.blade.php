
@extends('layouts.admin')
@section('css')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@stop
@section('main')
<body>

    <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
      @csrf  
      <div class="form-group">
        <legend>Form thêm mới</legend>
        <div class="col-md-8">
            <div class="form-group">
              <label for="">Nhập tên sản phẩm</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{ old('name')}}">
                @error('name') <span style="color:red">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
              <label for="">Mô tả sản phẩm</label>
              <textarea class="form-control" name="content" id="summernote-editor" rows="3" >{{ old('content')}} </textarea>
              @error('content') <span style="color:red">{{$message}}</span> @enderror
            </div>
           
          </div>
            
         <div class="col-md-4">
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select class="form-control" name="category_id" id="input"  >
                  <option value="">Chọn danh mục--</option>
                  
                  @foreach ($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                 
                </select>
                @error('category_id') <span style="color:red">{{$message}}</span> @enderror
            </div>
     
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text"
                  class="form-control" name="price" id="" aria-describedby="helpId" placeholder="" value="{{ old('price')}}">
                  @error('price') <span style="color:red">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                  <label for="">Giá khuyến mại</label>
                  <input type="text"
                    class="form-control" name="sale_price" id="" aria-describedby="helpId" placeholder="" value="{{ old('sale_price')}}">         
                    @error('sale_price') <span style="color:red">{{$message}}</span> @enderror    
            </div>
            <div class="form-group">
                  <label for="">Ảnh sản phẩm</label>
                  <input type="file" class="form-control-file" name="upload" id="" placeholder="" aria-describedby="fileHelpId">
                  @error('upload') <span style="color:red">{{$message}}</span> @enderror
            </div>
            <div class="form-check">
                    <label class=""> Trạng thái </label>
                    <br>
                    <input type="radio" name="status" id="" value="1" checked>
                    Hiện
                    <input type="radio" name="status" id="" value="0">
                    Ẩn
               
            </div>
            
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Lưu </button>
               
            </div>
      </div>

    
    </form>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

@stop()
@section('css')

@stop
@section('js')

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
@stop
<script>
  $(document).ready(function(){

    // Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote-editor').summernote({
      toolbar: [
        ['popovers', ['lfm']],
      ],
      buttons: {
        lfm: LFMButton
      }$
    })
  });
</script>

