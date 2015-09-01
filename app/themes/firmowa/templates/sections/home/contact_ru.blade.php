<div class="contact hidden-xs hidden-sm" id="{{ trans('routes.home_contact_contact') }}">
    <h2>{{ trans('interface.home_contact_contact') }}</h2>
    <div class="contact__menu" id="{{ trans('routes.home_contact_contactmenu') }}">
        <div class="container-fluid">
            <ul class="list-unstyled" role="tablist">
                <li class="active"><a class="contact-map-tab" href="#contact-box-1" role="tab" data-toggle="tab">{{ trans('interface.home_contact_companydetails') }}</a></li>
                <li><a href="#marketing1" role="tab" data-toggle="tab" class="has-more" data-subtabs="#subtabs-2">{{ trans('interface.home_contact_marketing') }}</a></li>
                <li><a href="#contact-box-7" role="tab" data-toggle="tab">{{ trans('interface.home_contact_contactform') }}</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="subtabs-2" class="contact__menu contact__menu--submenu animated slideInDown">
            <div class="container-fluid">
                <ul class="list-unstyled" role="tablist">
                    <li><a href="#marketing1" role="tab" data-toggle="tab">PROFESSIONAL</a></li>
                    <li><a href="#marketing2" role="tab" data-toggle="tab">SPECTRAL</a></li>
                    <li><a href="#marketing3" role="tab" data-toggle="tab">INDUSTRIAL</a></li>
                    <li><a href="#marketing5" role="tab" data-toggle="tab">NOVOFLOOR</a></li>
                    <li><a href="#marketing6" role="tab" data-toggle="tab">SUPRA</a></li>
                    <li><a href="#marketing8" role="tab" data-toggle="tab">ULTRA LINE</a></li>
                </ul>
            </div>
        </div>
        <div id="contact-box-1" role="tabpanel" class="tab-pane tab-pane-map active">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{ renderText($category->texts, 'contactMain', 'title') }}</h4>

                        <address class="contact__address">
                            <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMain', 'content') }}</div>
                        </address>
                    </div>
                </div>
            </div>
            <div id="contact-map" class="google-map"></div>
        </div>
        <div id="contact-box-7" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                {{ Form::open(array('url' => 'ajax/sendContactEmail', 'method' => 'post', 'id' => 'contact-form', 'novalidate' => 'novalidate')) }}
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{ trans('interface.home_contact_who') }}</h4>
                        <ul id="privateBusiness" class="contact__options list-unstyled">
                            <li>
                                <div class="df_line">
                                    <div class="df_radio">
                                        <input value="general" id="checkbox-option-1" name="private_business" type="radio">
                                        <label for="checkbox-option-1"></label>
                                    </div>
                                    <label for="checkbox-option-1">
                                        {{ trans('interface.home_contact_main') }}
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="df_line">
                                    <div class="df_radio">
                                        <input value="marketing_general" id="checkbox-option-2" name="private_business" type="radio">
                                        <label for="checkbox-option-2"></label>
                                    </div>
                                    <label for="checkbox-option-2">
                                        {{ trans('interface.home_contact_marketing_basic') }}
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="form-default form-contact">
                            <div class="form-group">
                                <label for="input-user">{{ trans('interface.home_contact_name') }}</label>
                                <input type="text" class="form-control" id="input-user" name="name" placeholder="{{ trans('interface.home_contact_nameex') }}">
                            </div>
                            <div class="form-group">
                                <label for="input-email">{{ trans('interface.home_contact_email') }}</label>
                                <input type="email" class="form-control" id="input-email" name="email" placeholder="{{ trans('interface.home_contact_emailex') }}">
                            </div>
                            <div class="form-group">
                                <label for="input-text">{{ trans('interface.home_contact_message') }}</label>
                                <textarea class="form-control" id="input-text" name="content" placeholder="{{ trans('interface.home_contact_messageex') }}"></textarea>
                            </div>
                            <div class="df_line">
                                <div class="df_checkbox">
                                    <input value="private" id="checkbox-option-8" type="checkbox" name="send_copy">
                                    <label for="checkbox-option-8"></label>
                                </div>
                                <label for="checkbox-option-8">
                                    {{ trans('interface.home_contact_sendmeacopy') }}
                                </label>
                            </div>
                            <div class="clearfix submit-button">
                                <button type="submit" class="btn btn-default pull-right">{{ trans('interface.home_contact_send') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div id="marketing1" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMark', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMark', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing2" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkSpectral', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkSpectral', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing3" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkIndustrial', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkIndustrial', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing5" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkFloor', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkFloor', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing6" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkSupra', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkSupra', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing8" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkUltra', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkUltra', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>