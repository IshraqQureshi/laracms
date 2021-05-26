<section id="input-style">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                {!! Form::open(['url' => route('saveCategory'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                  
                  <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-3">  
                            {!! Form::label('name', 'Name') !!}
                          </div>
                          <div class="col-lg-10 col-9">
                            {{ Form::text('name', GeneralHelper::set_values('name', isset($category) ? $category->name : ''), array('class' => 'form-control round', 'placeholder' => 'Enter Name')) }}
                          </div>                  
                            @error('name')
                              <div class="col-lg-12 text-danger mt-2 text-end">  
                                {{ $errors->first('name') }}
                              </div>
                            @enderror                          
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end">
                      @isset($category)
                        {{ Form::hidden('edit_id', $category->id) }}
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