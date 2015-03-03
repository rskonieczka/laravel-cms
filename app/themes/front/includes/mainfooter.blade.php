<section class="media-section darkbg" style="background:#20221f;">
    <div class="inner" style="padding: 10px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid">Contact Us</h1>
        </div>
    </div>
</section>

<section class="container section">
    <div class="row">
        <div class="col-sm-6">
            <div class="successMessage alert alert-success" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Thank You!
            </div>
            <div class="errorMessage alert alert-danger" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Ups! An error occured. Please try again later.
            </div>

            <form role="form" action="/send-email" method="post" class="contactForm validateIt"
                  data-email-subject="Contact Form" data-show-errors="true">
                <div class="row padding-xs-top">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group form-group-float-label">
                            <input id="contact_name" placeholder="Name" required type="text" name="field[]" class="form-control input-lg">
                            <label for="contact_name">Name *</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group form-group-float-label">
                            <input id="contact_email" placeholder="Email" required type="email" name="field[]" class="form-control input-lg">
                            <label for="contact_email">Email *</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-group-float-label">
                            <input id="state_message" placeholder="State" required type="text" name="field[]" class="form-control input-lg">
                            <label for="state_message">State *</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group form-group-float-label">
                            <textarea id="contact_message" class="form-control input-lg" rows="4" name="field[]" required
                                      placeholder="Message"></textarea>
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
            <h4 class="uppercase hr-left">{{ $category->texts->contactData->title }}</h4>
                {{ $category->texts->contactData->content }}
        </div>
    </div>
</section>