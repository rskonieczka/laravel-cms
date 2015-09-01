<section class="contact-section" id="{{ trans('routes.home_contact_contact') }}">
    <h2>{{ trans('interface.home_contact_contact') }}</h2>
    <div class="contact-menu" id="{{ trans('routes.home_contact_contactmenu') }}">
        <div class="container-fluid">
            <ul class="list-unstyled" role="tablist">
                <li class="active"><a class="contact-map-tab" href="#contact-box-1" role="tab" data-toggle="tab">{{ trans('interface.home_contact_companydetails') }}</a></li>
                <li><a href="#contact-box-3" role="tab" data-toggle="tab" data-subtabs="#subtabs-2">{{ trans('interface.home_contact_marketing') }}</a></li>

            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="contact-box-1" role="tabpanel" class="tab-pane tab-pane-map active">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h3>{{ renderText($category->texts, 'contactCompany', 'title') }}</h3>
                        <address class="contact-address">
                            {{ renderText($category->texts, 'contactCompany', 'content') }}
                        </address>
                    </div>
                </div>
            </div>
            <div id="contact-map"></div>
        </div>
        <div id="contact-box-3" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{ renderText($category->texts, 'contactMark', 'title') }}</h3>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div>{{ renderText($category->texts, 'contactMark', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>