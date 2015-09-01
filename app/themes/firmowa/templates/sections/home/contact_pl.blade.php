<div class="contact hidden-xs hidden-sm" id="{{ trans('routes.home_contact_contact') }}">
    <h2>{{ trans('interface.home_contact_contact') }}</h2>
    <div class="contact__menu" id="{{ trans('routes.home_contact_contactmenu') }}">
        <div class="container-fluid">
            <ul class="list-unstyled" role="tablist">
                <li class="active"><a class="contact-map-tab" href="#contact-box-1" role="tab" data-toggle="tab">{{ trans('interface.home_contact_companydetails') }}</a></li>
                <li><a href="#rh1" role="tab" data-toggle="tab" class="has-more" data-subtabs="#subtabs-1">{{ trans('interface.home_contact_rh') }}</a></li>
                <li><a href="#marketing1" role="tab" data-toggle="tab" class="has-more" data-subtabs="#subtabs-2">{{ trans('interface.home_contact_marketing') }}</a></li>
                <li><a href="#marketing-exp1" role="tab" data-toggle="tab" class="has-more"
                       data-subtabs="#subtabs-4">{{ trans('interface.home_contact_mark-export') }}</a></li>
                <li><a href="#contact-box-4" role="tab" data-toggle="tab">{{ trans('interface.home_contact_sale')}}</a></li>
                <li><a href="#obranches0" role="tab" data-toggle="tab" class="has-more" data-subtabs="#subtabs-3">{{
                trans('interface.home_contact_other') }}</a></li>
                <li><a href="#contact-box-7" role="tab" data-toggle="tab">{{ trans('interface.home_contact_contactform') }}</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="subtabs-1" class="contact__menu contact__menu--submenu animated slideInDown">
            <div class="container-fluid">
                <ul class="list-unstyled" role="tablist">
                    <li><a href="#rh1" role="tab" data-toggle="tab">PROFESSIONAL/SPECTRAL/ULTRA</a></li>
                    <li><a href="#rh2" role="tab" data-toggle="tab">NOVOL FOR Classic Car</a></li>
                    <li><a href="#rh3" role="tab" data-toggle="tab">NOVOFLOOR</a></li>
                    <li><a href="#rh4" role="tab" data-toggle="tab">NAUTIC</a></li>
                    <li><a href="#rh5" role="tab" data-toggle="tab">SUPRA</a></li>
                </ul>
            </div>
        </div>
        <div id="subtabs-2" class="contact__menu contact__menu--submenu animated slideInDown">
            <div class="container-fluid">
                <ul class="list-unstyled" role="tablist">
                    <li><a href="#marketing1" role="tab" data-toggle="tab">PROFESSIONAL</a></li>
                    <li><a href="#marketing2" role="tab" data-toggle="tab">SPECTRAL</a></li>
                    <li><a href="#marketing3" role="tab" data-toggle="tab">INDUSTRIAL</a></li>
                    <li><a href="#marketing4" role="tab" data-toggle="tab">NOVOL FOR Classic Car</a></li>
                    <li><a href="#marketing5" role="tab" data-toggle="tab">NOVOFLOOR</a></li>
                    <li><a href="#marketing6" role="tab" data-toggle="tab">SUPRA</a></li>
                    <li><a href="#marketing7" role="tab" data-toggle="tab">NAUTIC</a></li>
                    <li><a href="#marketing8" role="tab" data-toggle="tab">ULTRA LINE</a></li>
                </ul>
            </div>
        </div>
        <div id="subtabs-4" class="contact__menu contact__menu--submenu animated slideInDown">
            <div class="container-fluid">
                <ul class="list-unstyled" role="tablist">
                    <li><a href="#marketing-exp1" role="tab" data-toggle="tab">PROFESSIONAL</a></li>
                    <li><a href="#marketing-exp2" role="tab" data-toggle="tab">SPECTRAL</a></li>
                    <li><a href="#marketing-exp3" role="tab" data-toggle="tab">INDUSTRIAL</a></li>
                    <li><a href="#marketing-exp4" role="tab" data-toggle="tab">NOVOL FOR Classic Car</a></li>
                    <li><a href="#marketing-exp5" role="tab" data-toggle="tab">NOVOFLOOR</a></li>
                    <li><a href="#marketing-exp6" role="tab" data-toggle="tab">SUPRA</a></li>
                    <li><a href="#marketing-exp7" role="tab" data-toggle="tab">NAUTIC</a></li>
                    <li><a href="#marketing-exp8" role="tab" data-toggle="tab">ULTRA LINE</a></li>
                </ul>
            </div>
        </div>
        <div id="subtabs-3" class="contact__menu contact__menu--submenu animated slideInDown">
            <div class="container-fluid">
                <ul class="list-unstyled" role="tablist">
                    <li><a href="#obranches0" role="tab" data-toggle="tab">{{ trans('interface.home_contact_workshops') }}</a></li>
                    <li><a href="#obranches1" role="tab" data-toggle="tab">{{ trans('interface.home_contact_researchlab') }}</a></li>
                    <li><a href="#obranches2" role="tab" data-toggle="tab">{{ trans('interface.home_contact_technolab') }}</a></li>
                    <li><a href="#obranches3" role="tab" data-toggle="tab">{{ trans('interface.home_contact_production') }}</a></li>
                    <li><a href="#obranches4" role="tab" data-toggle="tab">{{ trans('interface.home_contact_promotion') }}</a></li>
                    <li><a href="#obranches5" role="tab" data-toggle="tab">{{ trans('interface.home_contact_personnel') }}</a></li>
                    <li><a href="#obranches6" role="tab" data-toggle="tab">{{ trans('interface.home_contact_technical') }}</a></li>
                    <li><a href="#obranches7" role="tab" data-toggle="tab">{{ trans('interface.home_contact_finance') }}</a></li>
                    <li><a href="#obranches8" role="tab" data-toggle="tab">{{ trans('interface.home_contact_audit') }}</a></li>
                    <li><a href="#obranches9" role="tab" data-toggle="tab">{{ trans('interface.home_contact_director') }}</a></li>
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
        <div id="contact-box-4" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactSale', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactSale', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contact-box-7" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                @include('theme::templates.sections.home.contactForm')
            </div>
        </div>
        <div id="rh1" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{ renderText($category->texts, 'contactPr', 'title') }}</h4>
                        <br />
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPr', 'content') }}</div>
                    </div>
                    <div class="col-md-6">
						<div class="contact__map">
							<div class="region-map">
								<svg version="1.1" id="map" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0"
									 viewBox="0 0 524.4094 486.7112" enable-background="new 0 0 524.4094 486.7112" xml:space="preserve">
									<radialGradient id="bg" cx="262.2047" cy="243.3556" r="252.9558" gradientUnits="userSpaceOnUse">
										<stop  offset="0" style="stop-color:#ffffff"></stop>
										<stop  offset="1" style="stop-color:#eceeec"></stop>
									</radialGradient>

									<path id="polska" opacity="0.3" fill="url(#bg)" d="M104.3433,47.1228l22.215-25.5809l35.0055-12.1173L210.7062,0
										l30.2932,6.0586l6.0586,10.7709l-23.5614-0.6732l2.6927,20.1955l20.8687,7.405l35.6787-10.7709l62.606,8.0782l84.1479-2.6927
										l12.7905-7.405l20.1955,10.0977l13.4637,13.4637l10.0977,44.4301l12.7905,36.3519l7.405,28.2737l-7.405,14.1368l-17.5027,8.7514
										l-13.4637,23.5614l18.1759,12.1173l8.0782,8.7514l-1.3463,12.418c0,0-5.3855,21.9143-0.6732,26.6266
										s10.0977,16.1564,10.0977,16.1564V298.22l22.215,28.9469v35.6787l-14.81,8.0782l-50.4887,62.606l-4.7123,13.4637l14.1368,39.7178
										h-20.8687l-24.2346-8.0782l-12.7905-14.81l-30.2932-6.0587l-20.8687,12.1173l-35.6787-3.3659l-13.4637,13.4637h-14.1368
										l-26.7388-30.9664l-16.3449,11.4441l-24.9078-25.5809l-37.6982-20.1955l-16.1564-16.1564l-8.0782-9.4246l-24.9078-12.7905
										l-2.0196,16.1564l-15.4832,7.405l-19.5223-26.9273l3.3659-14.1368l-20.8687-4.0391l-33.6591-17.5027l-14.81-14.1368v-30.9664
										l-19.5223-16.9036v-26.8533l6.7318-27.6005l-6.7318-18.8491v-17.5028L0,163.5834v-12.1173l16.1564-26.2541L8.0782,71.3574
										l51.1619-13.4637L104.3433,47.1228z"></path>
									<polygon id="zachodniopomorskie" data-area="Zachodniopomorskie" data-x="0" data-y="0" data-width="220" data-height="110" data-name="Artur Drabek" data-tel="785 045 080" data-email="artur.drabek@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" points="
											161.5639,9.4246 126.5584,21.5419 104.3433,47.1228 59.2401,57.8937 8.0782,71.3574 16.1564,125.212 1,151.4661 1,163.5834
											18.8491,184.4521 18.8491,201.9549 21.4954,209.3645 39.0446,201.9549 80.7819,195.8962 104.3433,170.3153 114.4411,146.0807
											133.9634,119.8265 143.388,90.8797 148.7734,55.8742 163.0698,9.1357 "></polygon>
									<polygon id="kujawy_i_pomorze" data-area="Kujawy i Pomorze" data-x="130" data-y="0" data-width="190" data-height="110" data-name="Henryk Kiedrowski" data-tel="601 064 684" data-email="henryk.kiedrowski@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" points="
										345.4992,41.0591 345.3428,41.0642 282.7368,32.986 247.0581,43.7569 226.1894,36.3519 223.4967,16.1564 247.0581,16.8296
										240.9995,6.0586 210.7062,0 163.0698,9.1357 148.7734,55.8742 143.388,90.8797 135.759,114.3114 163.0698,138.0025
										183.1057,158.198 208.0135,167.6225 233.5945,167.6225 252.4436,167.6225 265.1689,151.4661 286.1027,130.5975 284.0832,109.2501
										316.3959,92.8992"></polygon>
									<polygon id="podlasie" data-area="Podlasie" data-x="330" data-y="10" data-width="180" data-height="110" data-name="Krzysztof Roszko" data-tel="691 701 916" data-email="krzysztof.roszko@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" points="498.8285,177.7203
										506.2335,163.5834 498.8285,135.3098 486.038,98.9579 475.9403,54.5278 462.4766,41.0642 442.2811,30.9664 429.4907,38.3714
										345.4992,41.0591 317.3836,91.1399 335.2451,97.6115 378.3288,123.1925 402.5634,159.5443 419.3929,190.5107 438.242,202.628
										449.013,212.7258 456.418,228.209 494.068,231.3465 494.1162,230.9017 486.038,222.1503 467.8621,210.0331 481.3257,186.4716"></polygon>
									<polygon id="wielkopolska" data-area="Wielkopolska" data-x="50" data-y="90" data-width="190" data-height="110" data-name="Grzegorz Krysiński" data-tel="661 660 686" data-email="grzegorz.krysinski@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" points="276.6782,191.8571
										258.5022,173.6812 253.9772,165.6754 252.4436,167.6225 233.5945,167.6225 208.0135,167.6225 183.1057,158.198 163.0698,138.0025
										135.759,114.3114 133.9634,119.8265 114.4411,146.0807 104.3433,170.3153 80.7819,195.8962 39.0446,201.9549 21.4954,209.3645
										18.8491,201.9549 25.5809,220.804 18.8491,248.4045 18.8491,264.2999 37.0251,259.8486 70.6842,259.8486 106.3629,275.2578
										146.7539,282.0636 173.008,282.0636 199.2621,270.9561 225.5163,249.0777 229.5554,243.3197 250.424,251.0972 273.3123,256.4827
										291.4882,262.6916 286.1027,215.4185"></polygon>
									<path id="mazowsze_i_swietokrzyskie" data-area="Mazowsze i Świętokrzyskie" data-x="210" data-y="100" data-width="270" data-height="110" data-name="Dariusz Kolaszt" data-tel="785 045 081" data-email="dariusz.kolaszt@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" d="
										M265.1689,151.4661l20.9338-20.8687l-2.0196-21.3474l32.3128-16.3508l0.9877-1.7593l17.8615,6.4716l43.0837,25.581l24.2346,36.3519
										l16.8296,30.9664l18.8491,12.1173l10.7709,10.0977l7.405,15.4832l0.118,0.0099l-2.5863,8.9659l-13.4637,19.298l-23.7858,18.7751
										l-29.1713,17.128l2.6927,30.0689l-2.2439,25.581l-7.6294,26.0297c-1.1219,0.1122-8.7514,0.561-8.7514,0.561l-13.0149,6.3952
										l-3.8147,3.8147l-8.8636,3.4781h-13.5759l-10.5465-7.8538l-13.9124-16.7174l-7.2928-10.8831l7.5172-21.654l3.9269-14.0247
										l-2.9172-29.8445l-8.7514-15.8198l-8.8635-5.722v-3.1034l-5.3855-47.2731l-9.4246-23.5614l-18.1759-18.1759l-4.525-8.0058
										L265.1689,151.4661z"></path>
									<polygon id="lodzkie_czestochowa" data-area="Łódzkie, Częstochowa" data-x="140" data-y="200" data-width="230" data-height="110" data-name="Krzysztof Roszko" data-tel="691 701 916" data-email="krzysztof.roszko@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" points="
										312.0203,317.1813 309.1031,287.3368 300.3517,271.517 291.4882,265.795 291.4882,262.6916 273.3123,256.4827 250.424,251.0972
										229.5554,243.3197 225.5163,249.0777 209.6165,262.3275 204.6476,275.2578 202.628,287.0002 200.1597,306.2982 199.2621,320.435
										197.467,344.6696 197.467,350.0551 211.6038,355.2161 242.7946,360.826 262.2047,362.1724 272.4146,362.1724 282.9612,357.9089
										293.9565,352.7478 300.5761,352.86 308.0933,331.206"></polygon>
									<polygon id="dolny_slask" data-area="Dolny Śląsk" data-x="30" data-y="215" data-width="180" data-height="110" data-name="Damian Osmęda" data-tel="601 064 680" data-email="damian.osmeda@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" points="
										209.6165,262.3275 204.6476,275.2578 202.628,287.0002 200.1597,306.2982 199.2621,320.435 197.467,344.6696 197.467,350.0551
										197.467,362.1724 194.5499,380.6849 188.8278,388.3143 181.8701,406.0399 174.3544,398.5243 166.2762,389.0997 141.3684,376.3092
										139.3488,392.4656 123.8656,399.8706 104.3433,372.9433 107.7093,358.8065 86.8406,354.7674 53.1814,337.2646 38.3714,323.1278
										38.3714,292.1614 18.8491,275.2578 18.8491,264.2999 37.0251,259.8486 70.6842,259.8486 106.3629,275.2578 146.7539,282.0636
										173.008,282.0636 199.2621,270.9561"></polygon>
									<path id="gorny_slask_malopolska" data-area="Górny Śląsk, Małopolska" data-x="170" data-y="295" data-width="248" data-height="110" data-name="Krzysztof Tomaszewski" data-tel="601 064 681" data-email="krzysztof.tomaszewski@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" d="
										M386.7436,386.407l-3.7025-12.5661l-2.6927,0.2244c-1.1219,0.1122-8.7514,0.561-8.7514,0.561l-13.0149,6.3952l-3.8147,3.8147
										l-8.8636,3.4781h-13.5759l-10.5465-7.8538l-13.9124-16.7174l-7.2928-10.8831l-6.6197-0.1122l-10.9953,5.161l-10.5466,4.2635
										h-10.2099l-19.4101-1.3464l-31.1908-5.6099l-14.1368-5.161v12.1173l-2.9171,18.5125l-5.7221,7.6294l-6.9577,17.7257l8.6407,8.6407
										l37.6982,20.1955l24.9078,25.5809l16.3449-11.4441l26.7388,30.9664h14.1368l13.4637-13.4637l35.6787,3.3659l20.8687-12.1173
										l6.0516,1.2103l-1.7881-8.6153l2.4683-9.649l-1.2342-15.932l3.0293-23.3371L386.7436,386.407z"></path>
									<path id="podkarpacie_lubelskie" data-area="Podkarpacie, Lubelskie" data-x="330" data-y="210" data-width="190" data-height="128" data-name="Jarosław Podgórski" data-tel="607 106 642" data-email="jaroslaw.podgorski@novol.pl" fill="transparent" stroke="#D71E16" stroke-width="0.5" d="M502.1944,298.22
										v-12.1173c0,0-5.3855-11.4441-10.0977-16.1564s0.6732-26.6266,0.6732-26.6266l1.3463-12.418l-0.0482,0.4447l-37.65-3.1375
										l0.118,0.0099l-2.5863,8.9659l-13.4637,19.298l-23.7858,18.7751l-29.1713,17.128l2.6927,30.0689l-2.2439,25.581l-7.6294,26.0297
										l2.6927-0.2244l3.7025,12.5661l2.1317,15.0344l-3.0293,23.3371l1.2342,15.932l-2.4683,9.649l1.7881,8.6153l-0.9892-0.1978
										l25.2308,5.0462l12.7905,14.81l24.2346,8.0782h20.8687l-14.1368-39.7178l4.7123-13.4637l50.4887-62.606l14.81-8.0782v-35.6787
										L502.1944,298.22z"></path>
									<g>
										<g>
											<polyline fill="none" stroke="#D71E16" stroke-width="0.5" stroke-dasharray="5.0398,2.0159" points="
												383.155,293.5095 380.3483,294.2306 368.4547,294.8556 357.8297,293.6207 345.5797,289.8556 337.0797,287.1056 319.9547,280.1056
												308.2047,275.3556 303.5033,273.0576"></polyline>
										</g>
									</g>
								</svg>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <div id="rh2" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactPrClassic', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPrClassic', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rh3" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactPrFloor', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPrFloor', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rh4" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactPrNautic', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPrNautic', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rh5" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactPrSupra', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPrSupra', 'content') }}</div>
                    </div>
                </div>
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
        <div id="marketing4" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkClassic', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkClassic', 'content') }}</div>
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
        <div id="marketing7" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkNautic', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkNautic', 'content') }}</div>
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

        <div id="marketing-exp1" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp2" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkSpectralE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkSpectralE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp3" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkIndustrialE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkIndustrialE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp4" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkClassicE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkClassicE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp5" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkFloorE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkFloorE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp6" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkSupraE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkSupraE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp7" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkNauticE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkNauticE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="marketing-exp8" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactMarkUltraE', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactMarkUltraE', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="obranches0" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactWorkshops', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactWorkshops', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches1" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactLab', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactLab', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches2" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactLabtech', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactLabtech', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches3" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactProduction', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactProduction', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches4" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactPromotion', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPromotion', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches5" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactPersonnel', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactPersonnel', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches6" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactTechnical', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactTechnical', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches7" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactFinancial', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactFinancial', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches8" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ renderText($category->texts, 'contactAudit', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactAudit', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="obranches9" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4> {{ renderText($category->texts, 'contactDirector', 'title') }}</h4>
                        <br />
                    </div>
                    <div class="col-md-12">
                        <div class="wysiwyg-content">{{ renderText($category->texts, 'contactDirector', 'content') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>