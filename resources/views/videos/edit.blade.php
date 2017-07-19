@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->

              {{-- @include('videos.form_errors') --}}
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                </div>
              @endif


            	{!! Form::model($video, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['VideosController@update', $video->id]]) !!}

            	   {{-- @include('videos.form', ['buttonText' => 'Dodaj video']) --}}
                 <div class="form-group">
                     <div  class="col-md-4 control-label">
                       {!! Form::label('title', 'Tytuł:') !!}
                     </div>
                     <div class="col-md-6">
                         {!! Form::text('title', null, ['class' => 'form-control']) !!}
                     </div>
                 </div>

                 <div class="form-group">
                     <div  class="col-md-4 control-label">
                       {!! Form::label('description', 'Opis:') !!}
                     </div>
                     <div class="col-md-6">
                         {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                     </div>
                 </div>

                 <div class="form-group">
                     <div  class="col-md-4 control-label">
                       {!! Form::label('url', 'Link do filmu:') !!}
                     </div>
                     <div class="col-md-6">
                         {!! Form::text('url', null, ['class' => 'form-control']) !!}
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="col-md-6 col-md-offset-4">
                         {{-- {!! Form::submit($buttonText, ['class' => 'btn btn-primary']) !!} --}}
                         {!! Form::submit("Dodaj artykuł", ['class' => 'btn btn-primary']) !!}
                     </div>
                 </div>

              {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@stop
