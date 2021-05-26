<section id="input-style">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                {!! Form::open(['url' => route('savePost'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                  
                  <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-3">  
                            {!! Form::label('title', 'Title') !!}
                          </div>
                          <div class="col-lg-10 col-9">
                            {{ Form::text('title', GeneralHelper::set_values('title', isset($post) ? $post->title : ''), array('class' => 'form-control round', 'placeholder' => 'Enter Title')) }}
                          </div>                  
                            @error('title')
                              <div class="col-lg-12 text-danger mt-2 text-end">  
                                {{ $errors->first('title') }}
                              </div>
                            @enderror                          
                        </div>
                    </div>
                  </div>
                  
                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">  
                          {!! Form::label('content', 'Content') !!}
                        </div>
                        <div class="col-lg-10 col-9">
                          {{ Form::textarea('content', GeneralHelper::set_values('content', isset($post) ? $post->content : ''), array('class' => 'form-control round', 'placeholder' => 'Enter Content')) }}
                        </div>                  
                          @error('content')
                            <div class="col-lg-12 text-danger mt-2 text-end">  
                              {{ $errors->first('content') }}
                            </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">  
                          {!! Form::label('featured_image', 'Featured Image') !!}
                        </div>
                        <div class="col-lg-10 col-9">
                          {{ Form::file('featured_image', array('class' => '')) }}
                          @isset($post)
                          <a href="{{url('/'. $post->featured_image)}}">{{url('/'. $post->featured_image)}}</a>
                          @endisset
                        </div>                  
                          @error('content')
                            <div class="col-lg-12 text-danger mt-2 text-end">  
                              {{ $errors->first('featured_image') }}
                            </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end">
                      @isset($post)
                        {{ Form::hidden('edit_id', $post->id) }}
                      @endisset
                      {{ Form::submit('Save', array('class' => 'btn btn-primary me-1 mb-1')) }}
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
</section>