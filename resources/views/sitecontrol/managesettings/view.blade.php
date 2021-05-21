<section id="input-style">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                {!! Form::open(['url' => route('saveSettings'), 'method' => 'post']) !!}
                  <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-3">  
                            {!! Form::label('site_title', 'Site Title') !!}
                          </div>
                          <div class="col-lg-10 col-9">
                            {{ Form::text('site_title', GeneralHelper::set_values('site_title', $site_settings['site_title']), array('class' => 'form-control round', 'placeholder' => 'Enter Site Title')) }}
                          </div>                  
                            @error('site_title')
                              <div class="col-lg-12 text-danger mt-2 text-end">  
                                {{ $errors->first('site_title') }}
                              </div>
                            @enderror                          
                        </div>
                    </div>
                  </div>
                  
                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">  
                          {!! Form::label('site_theme', 'Site Theme') !!}
                        </div>
                        <div class="col-lg-10 col-9">
                          {{ Form::select('site_theme', DropdownHelper::siteTheme(), GeneralHelper::set_values('site_theme', $site_settings['site_theme']), array('class' => 'form-select')) }}
                        </div>                  
                          @error('site_theme')
                            <div class="col-lg-12 text-danger mt-2 text-end">  
                              {{ $errors->first('site_theme') }}
                            </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">  
                          {!! Form::label('font_sizes', 'Font Sizes') !!}
                        </div>
                        <div class="col-lg-10 col-9">
                          {{ Form::select('font_sizes', DropdownHelper::fontSizes(), GeneralHelper::set_values('font_sizes', $site_settings['font_sizes']), array('class' => 'form-select')) }}
                        </div>                  
                          @error('font_sizes')
                            <div class="col-lg-12 text-danger mt-2 text-end">  
                              {{ $errors->first('font_sizes') }}
                            </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">  
                          {!! Form::label('admin_email', 'Admin Email') !!}
                        </div>
                        <div class="col-lg-10 col-9">
                          {{ Form::text('admin_email', GeneralHelper::set_values('admin_email', $site_settings['admin_email']), array('class' => 'form-control round', 'placeholder' => 'Enter Admin Email')) }}
                        </div>                  
                          @error('admin_email')
                            <div class="col-lg-12 text-danger mt-2 text-end">  
                              {{ $errors->first('admin_email') }}
                            </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">  
                          {!! Form::label('cc_emails', 'CC Emails') !!}
                        </div>
                        <div class="col-lg-10 col-9">
                          {{ Form::text('cc_emails', GeneralHelper::set_values('cc_emails', $site_settings['cc_emails']), array('class' => 'form-control round', 'placeholder' => 'Select Font Size')) }}
                        </div>                  
                          @error('cc_emails')
                            <div class="col-lg-12 text-danger mt-2 text-end">  
                              {{ $errors->first('cc_emails') }}
                            </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end">
                      {{ Form::submit('Save', array('class' => 'btn btn-primary me-1 mb-1')) }}
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
</section>