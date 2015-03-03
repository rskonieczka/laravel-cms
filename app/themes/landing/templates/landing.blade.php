@extends('theme::layout.master')

@section('template')
    <div class="rev-slider-container">
        <div id="rev1" class="rev-slider">
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="1" data-masterspeed="1">
                    <!-- MAIN IMAGE -->
                    {{ HTML::image('front/images/content/main-slide2.jpg', 'kenburns1',
                        array(
                            'data-bgposition' => 'center center',
                            'data-bgfit' => 'fade',
                            'data-bgpositionend' => 'center center',
                            )
                        )
                        }}

                    <div class="tp-caption customin customout h1 uppercase white medium"
                         data-x="center"
                         data-y="145"

                         data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="1000"
                         data-start="800"
                         data-easing="Back.easeInOut"
                         data-endspeed="300"
                         style="z-index: 7; text-align: center;">
                        <h2 style="margin-bottom: 0;">Are you ready for</h2>the biggest legal project ?
                        <hr>
                    </div>

                    <div class="tp-caption sfb"
                         data-x="center"
                         data-y="355"

                         data-speed="500"
                         data-start="1500"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 7; font-size:36px;">
                        <div id="countdown"></div>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <section class="section bg1" id="speakers">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="uppercase weight300">
                        Peoples
                    </h2>
                </div>
            </div>
            <div class="section-top">
                <div class="row">
                    @foreach($peopleMain as $pm)
                    <div class="col-sm-6 col-md-4">
                        <div class="project-thumb">
                            @if ($pm->photo){{ Imagecache::get('people/'.$pm->photo, 'panel')->img }}@endif

                            <div class="thumb-info">
                                <div class="thumb-links">
                                    <a class="thumb-link" title="Image Title Goes Here"><i class="fa fa-search"></i></a>
                                </div>
                                <a href="#" class="thumb-title">
                                    <h4>{{ $pm->name }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br/><br/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="partners flexslider" data-maxitems="12" data-minitems="1" data-itemwidth="138"
                             data-itemmargin="0" data-move="1" data-directionnav="true" data-controlnav="false">
                            <ul class="slides">
                                @foreach($peopleRest as $pr)
                                <li>
                                    <div class="project-thumb">
                                        @if ($pr->photo){{ Imagecache::get('people/'.$pr->photo, 'panel')->img }}@endif

                                        <div class="thumb-info">
                                            <div class="thumb-links">
                                                <a class="thumb-link" title="{{ $pm->name }}"><i
                                                            class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container"></div>
    <section class="section bg3" id="panels">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="uppercase weight300">
                        Panels
                    </h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <ul class="galleryFilters clearfix list-unstyled list-inline">
                                <li><a data-filter="*" class="btn btn-border active">All</a></li>
                                @foreach ($panelsCategories as $cat)
                                    <li><a data-filter=".{{ studly_case($cat->name) }}" class="btn btn-border">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div id="galleryContainer" class="galleryContainer clearfix col-4 withSpaces magnific-gallery">
                            @foreach ($panels as $panel)
                                <div class="galleryItem {{ studly_case($panel->name) }}">
                                    <a class="thumb-title" data-toggle="modal" data-target="#{{ studly_case($panel->title) }}" style="cursor:pointer;"><div class="project-thumb">
                                            @if ($panel->photo){{ Imagecache::get('panels/'.$panel->photo, 'panel')->img }}@endif

                                            <div class="thumb-info">

                                                <h4>{{ $panel->title }}</h4>
                                                <p style="font-size:11px;text-decoration:underline;margin:0;">Tell me more</p>

                                            </div>
                                        </div></a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade popup" id="{{ studly_case($panel->title) }}" tabindex="-1" role="dialog" aria-labelledby="{{ studly_case($panel->title) }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="container">
                                                    <button type="button" class="close" data-dismiss="modal" style="font-size:52px;" aria-hidden="true">&times;</button>
                                                    <h2 style="text-transform:uppercase;">{{ $panel->title }}</h2>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-lg-6">{{ Imagecache::get('panels/'.$panel->photo, '601x414')->img }}</div>
                                                        <div class="col-lg-6"><div style="max-height:400px; overflow:auto; text-align: justify;
    text-justify: inter-word;">{{ $panel->content }}</div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- / galleryContainer -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg1" id="the-place">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="uppercase weight300">
                        The place
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet bibendum lectus, non efficitur felis. Maecenas ac ligula ligula. Curabitur sed eros facilisis, pellentesque est ut, iaculis mauris. Phasellus lacus magna, rhoncus eu magna ac, blandit aliquam neque. Morbi tristique maximus felis at tempor. Cras ut quam est. Donec ac mollis arcu, non commodo dolor. Proin ultricies metus non augue tempus rutrum. Pellentesque lacinia eleifend sodales. Vestibulum pellentesque, dui et tincidunt volutpat, mauris metus maximus elit, id mollis dolor ex et tortor. Aliquam et neque eget arcu suscipit imperdiet. Mauris ac quam ipsum.
                </div>
            </div>
        </div>
    </section>
    <section class="section bg1" id="get-access">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="uppercase weight300">
                        Get access
                    </h2>
                </div>
            </div>
            <div class="row pricing">
                <section class="col-md-4 col-sm-6 text-center">
                    <h3 class="sep uppercase">
                        Guest
                    </h3>
                    <div class="sep">
                        <p style="text-align:left;font-size:13px;padding:10px 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus arcu nec hendrerit fringilla.
                            Mauris molestie erat in mauris dignissim, eget iaculis nisi ultrices. Duis aliquet nulla ex,
                            eu elementum mauris fringilla sed.</p>
                    </div>
                    <div class="sep text-center bg3">
                        <div class="btn-group-single">
                            <a href="#" class="btn btn-lg btn-danger">Buy a ticket</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <section class="col-md-4 col-sm-6 text-center">
                    <h4 class="sep uppercase">
                        Business
                    </h4>
                    <div class="sep">
                        <p style="text-align:left;font-size:13px;padding:10px 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus arcu nec hendrerit fringilla.
                            Mauris molestie erat in mauris dignissim, eget iaculis nisi ultrices. Duis aliquet nulla ex,
                            eu elementum mauris fringilla sed.</p>
                    </div>
                    <div class="sep text-center bg3">
                        <div class="btn-group-single">
                            <a href="#" class="btn" data-toggle="modal" data-target="#business">Get a free ticket *</a>
                            <a href="#" class="btn btn-danger">Buy a ticket</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <div class="clearfix visible-sm"></div>
                <hr class="visible-sm transparent">
                <section class="col-md-4 col-sm-6 text-center">
                    <h4 class="sep uppercase">
                        Expert
                    </h4>
                    <div class="sep">
                        <p style="text-align:left;font-size:13px;padding:10px 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus arcu nec hendrerit fringilla.
                            Mauris molestie erat in mauris dignissim, eget iaculis nisi ultrices. Duis aliquet nulla ex,
                            eu elementum mauris fringilla sed.</p>
                    </div>
                    <div class="sep text-center bg3">
                        <div class="btn-group-single">
                            <a href="#" class="btn">Get a free ticket *</a>
                            <a href="#" class="btn btn-danger">Buy a ticket</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p><br /><br /><small>(*) fill out a survey and get a free ticket</small></p>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg3" id="contact">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <div class="successMessage alert alert-success" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Thank You!
                    </div>
                    <div class="errorMessage alert alert-danger" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Ups! An error occured. Please try again later.
                    </div>

                    <form role="form" action="/send-email" method="post" class="contactForm validateIt" data-email-subject="Contact Form" data-show-errors="true">
                        <div class="row padding-xs-top">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-group-float-label">
                                    <input id="contact_name" placeholder="Name" required="" type="text" name="field[]" class="form-control input-lg" style="cursor: auto; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                                    <label for="contact_name">Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-group-float-label">
                                    <input id="contact_email" placeholder="Email" required="" type="email" name="field[]" class="form-control input-lg">
                                    <label for="contact_email">Email *</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-float-label">
                                    <input id="state_message" placeholder="State" required="" type="text" name="field[]" class="form-control input-lg">
                                    <label for="state_message">State *</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group form-group-float-label">
                                    <textarea id="contact_message" class="form-control input-lg" rows="4" name="field[]" required="" placeholder="Message"></textarea>
                                    <label for="contact_message">Message *</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-lg pull-right">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-4 col-lg-offset-1 contact-office">
                    <h4 class="uppercase hr-left">Contact data</h4>

                    <p><br>
                        ul. Kościuszki 69/1c<br>
                        90-436 Łódź<br>
                        NIP: 728-276-92-63<br>
                        KRS: 0000380083<br>
                        <br>
                        email: forum@law4growth.com</p>

                </div>
            </div>
        </div>
    </section>
    <div class="post-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    Copyright 2014 © Law4Growth sp. z o. o. All rights reserved.
                </div>
                <div class="col-sm-6 text-right">
                    <ul class="list-inline">
                        <li><div class="text-wrapper"><a href="https://www.facebook.com/legalcongress" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook fa-fw"></i></a></div></li>
                        <li><div class="text-wrapper"><a href="https://twitter.com/legal_congress" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter fa-fw"></i></a></div></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="business" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title uppercase text-center">I'm a business!</h2>
          </div>
          <div class="modal-body">
            <small>To get a free ticket leave your e-mail address and fill out a survey:</small><br /><br />
            {{ Form::open(array('id' => 'goToSurvey')) }}
                <div class="form-group @if ($errors->has('email')) has-error @endif">
                    {{ Form::label('email', 'E-mail address') }}
                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail address') ) }}
                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                </div>
                <div class="form-group @if ($errors->has('tocheck')) has-error @endif">
                    <label>
                    {{ Form::checkbox('tocheck', 1, Input::old('tocheck'), array('id' => 'tocheck')) }}
                    <small>I hereby give my consent to have my personal data by Law for Growth private limited
                    company, located on Kościuszki St. 69/1c, 90-436 Łódź, for the purposes connected with
                    account registration, ticket purchase and participation in Congress , in accordance with
                    Personal Data Protection Act, 29th of August, 1997 (Dz. U. Nr 133, poz. 883, with further
                    amendments).</small>
                    </label>

                </div>
                {{ Form::hidden('group', 'business' ) }}
                <div class="text-center">{{ Form::button('Save and go to survey', array('class' => 'btn btn-danger btn-flat btn-lg', 'type' => 'submit') ) }}</div>
                <div class="clearfix"></div>
            {{ Form::close() }}
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

@section('extrascripts')
    <script>
       $(document).ready(function()
       {
       	$('form#goToSurvey').submit(function()
       	{

       		$.ajax({
       			url: "{{ Url::to('validateSurveyForm') }}",
       			type: "post",
       			data: $('form#goToSurvey').serialize(),
       			datatype: "json",
       			beforeSend: function()
       			{
       				$('form#goToSurvey #ajax-loading').show();
       				$("form#goToSurvey .help-block").remove();
       				$("form#goToSurvey .alert.alert-success").remove();
       				$('form#goToSurvey').find('.has-error').removeClass('has-error');
       			}
       			})
       			.done(function(data)
       			{
       				if (data.success == false)
       				{
       					var arr = data.errors;
       					$.each(arr, function(index, value)
       					{
       						if (value.length != 0)
       						{
       						    $("#" + index).closest('.form-group').addClass('has-error');
       						    if(index !== 'tocheck'){
       						        $("#" + index).after('<span class="help-block">' + value + '</span>');
       						    }

       						}
       					});
       					$('#ajax-loading').hide();
       				}else{
       				    $('form#goToSurvey').prepend('<div class="alert alert-success">Congratulations, your account has been created, click on the activation link sent to your e-mail address and fill out the survey!</div>');
       				}
       			})
       			.fail(function(jqXHR, ajaxOptions, thrownError)
       			{
       				  alert('No response from server');
       			});
       			return false;
       	});
       });
    </script>
@stop