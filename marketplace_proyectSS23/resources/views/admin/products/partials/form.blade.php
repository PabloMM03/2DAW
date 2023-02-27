<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Introduzca el nombre del producto']) !!}

      @error('name')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>
  <div class="form-group">
      {!! Form::label('slug', 'Slug') !!}
      {!! Form::text('slug', null, ['class' => 'form-control' , 'placeholder' => 'Introduzca el Slug del producto', 'readonly']) !!}

      @error('slug')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>
  <div class="form-group">
      {!! Form::label('category_id', 'Categoría') !!}
      {!! Form::select('category_id', $categories,null, ['class' => 'form-control']) !!}

      {{--Añadir error en caso de validacion--}}
      @error('category_id')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  <div class="form-group">
      <p class="font-weight-bold">Etiquetas</p>
       @foreach ($tags as $tag)
          <label class="mr-2" for="">
              {!! Form::checkbox('tags[]', $tag->id, null) !!}
              {{$tag->name}}
          </label>
       @endforeach

       @error('tags')
          <br>
          <small class="text-danger">{{$message}}</small>
       @enderror

  </div>

  <div class="form-group">
      <p class="font-weight-bold">Estado de publicación</p>
      <label class="mr-2" for="">
          {!! Form::radio('status', 1, true) !!}
          No publicado
      </label>

      <label for="">
          {!! Form::radio('status', 2) !!}
          Publicado
      </label>

      @error('status')
          <br>
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  <div class="row mb-3">
      <div class="col">
          <div class="image-wrapper" >
              @isset ($product->image)
              <img id="imagenProd" src="{{Storage::url($product->image->url)}}" alt="">                  
              @else
                  <img src="https://cdn.pixabay.com/photo/2022/03/23/18/56/beach-7087722_1280.jpg" alt="Imagen por defecto">
              @endisset
          </div>
      </div>
      <div class="col">
          <div class="form-group">
              {!! Form::label('file', 'Imagen producto') !!}
              {!! Form::file('file', ['class' => 'form-control-file']) !!}
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel praesentium sequi incidunt, dolores rem, accusantium maxime vitae a fuga in ab suscipit eaque sunt, voluptates sint modi. Nulla, suscipit deserunt!</p>
      </div>
  </div>

  <div class="form-group">
      {!! Form::label('description', 'Descripcion:') !!}
      {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

      @error('description')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>
  <div class="form-group">
      {!! Form::label('price', 'Precio €:') !!}
      {!! Form::text('price', null, ['class' => 'form-control']) !!}

      @error('price')
          <small class="text-danger">{{$message}}</small>
      @enderror

  </div>

  @section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

{{--Formato de edicion de texto--}}
  @section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description') )
            .catch( error => {
                console.error( error );
            } );
    </script>


    <script>

//Hacer slug automatico
    $(document).ready( function() {
    $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

    });

    //Cambiar Imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(e){
        const file = e.target.files[0];

        const reader = new FileReader();

        reader.onload = (e) => {
            document.getElementById('imagenProd').setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }

    </script>

@endsection