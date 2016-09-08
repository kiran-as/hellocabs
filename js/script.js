/***************************/
//@Author: ARJUN 
//@website: www.entrustenergy.com/NES
//@email: arjun@softwaysolutions.net
        /***************************/
        $(function() {
    /*************For showing Enrollment right side boxes starts here***************/        
    $(".rhs_tabbed_snippet").eq(0).show();
    $(".rhs_tabbed_panel .rightWrapToggleBtn span").click(function() {
        var tab_index = $(".rhs_tabbed_panel .rightWrapToggleBtn span").index(this);
        $(".rhs_tabbed_snippet").hide();
        $(".rhs_tabbed_snippet").eq(tab_index).show();
    });
    /*************For showing Enrollment right side boxes ends here***************/        

    jQuery.validator.addMethod("numeric", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, '<div class="errorbox"><div class="error-message">Please enter numbers only</div><div class="error-arrow"></div></div>');
    // ******here validation for chars only @ARJUN*************
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Please enter alphabets only");

    // *******here validation method added for th US zipcode @ARJUN********  
    jQuery.validator.addMethod("zipcodeUS", function(value, element) {
        return this.optional(element) || /\d{5}-\d{4}$|^\d{5}$/.test(value);
    }, "Please enter valid Zip Code");
    // *************************************************************   
    /*****************US Phone number validaion method @ARJUN************/
    jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
    }, "Please specify a valid Phone Number");
    /***********************************************************/

    if ($('.SignUpBoxWrap').length) { // If SignUpBoxWrap added on the page we have to show the signup form
			var signup = signupwidget();//contactlinkNew();// signUpPage(); contactlink();//
        $('.SignUpBoxWrap').html(signup);// here we are pushing the form content into the div with class name SignUpBoxWrap

        // Validation added for the form  started here
        var container = $('div.container');
        
        /******************************Default validation added********************************/
         $.validator.addMethod("defaultInvalid_signup", function(value, element) {
            switch (element.value) {
                case "Zip Code*":
                    if (element.name == "data[enrollment][zipcode]")
                        return false;
                    break;

                default:
                    return true;
                    break;
            }
        });
        /************************************************************/
        
        
        $('#signUpForm').validate({
            /**************** validation rules started*******/
            rules: {
                'data[enrollment][zipcode]': {
                    required: true,
                    defaultInvalid_signup:true,
                    zipcodeUS: true                    
                }
            },
            /**************** validation rules ends*******/

            /***********here we are added the container for the error messages.. all the error messages will come to this div*/
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            /***********container ends here************/
            /****error message for the element based on the element name started*****************/
            messages: {
                'data[enrollment][zipcode]': {
                    required: "Please enter Zip Code",
                    defaultInvalid_signup: "Please enter Zip Code",
                    zipcodeUS: "Please enter valid Zip Code"                    
                },
            }
            /****error message ends*************************************/
        });
        /********************* Validation function for the form ends here********************/


        /****************Right side wrapper toggle option starts @ARJUN*****************/
        $('.ContactBtn').click(function() { // contact button click
            $('.benifitWrap').hide();
            $('.contactWrap').show();

        });
        $('.BenefitsBtn').click(function() {// benefit button click
            $('.contactWrap').hide();
            $('.benifitWrap').show();

        });
        /****************Right side wrapper toggle option starts*****************/
    }

    /**********************Right side contact deatails and working hours html integration starts here************************/
    if ($('.WorkingHrsWrap').length) {
		$('.WorkingHrsWrap').html('<div id="widget-login-container"><div id="widget-inner-container" style="padding-top:10px;padding-bottom:1px;margin-top: -20px;"><div class="widget-heading" style="text-align:center"><h2>We are here to help!</h2></div><br/><span>For questions, or to cancel your service</span><br/><br/><div class="widgetCustomerCareUp EmailUp">Email us at <a href="mailto:contactus@entrustenergy.com" style="color:#95969a;">contactus@entrustenergy.com</a></div><div class="widgetCustomerCareUp ContactUp"><span>Call us toll-free at</span><span><br/>1.888.521.5861</span></div><div class="widgetCustomerCareUp HoursUp"><span>Hours of operation:</span><br/><span>Monday – Friday</span><br/><span>8:00 am – 7:00 pm EST</span></div></div></div>');
	}

    /**********************Right side contact deatails and working hours html integration ends here************************/


    /****************Enrollment terms and condition validation function started  @author Kavya***********/
    if ($('#EnrollmentConfirmationForm').length) { // here we are confirming the form is enrollment 2  based on the id [EnrollmentAddstep2Form]
        var $agree_info = $('#EnrollmentAgreeInfo').attr('name');
        var $agree_terms = $('#EnrollmentAgreeTerms').attr('name');

        var $params = {
            debug: false, 
            rules: {}, 
            messages: {}
    };

    $params['rules'][$agree_info] = {
        "required": true
        };
    $params['messages'][$agree_info] = {
        "required": '<div class="errorbox rateError"><div class="error-message">Please check this box if you want to proceed</div><div class="error-arrow"></div></div>'
    };

    $params['rules'][$agree_terms] = {
        "required": true
        };
    $params['messages'][$agree_terms] = {
        "required": '<div class="errorbox rateError"><div class="error-message">Please check this box if you want to proceed</div><div class="error-arrow"></div></div>'
    };

        $("#EnrollmentConfirmationForm").validate($params);
    }
    /****************Enrollment terms and condition validation function ends*************************/

    /****************E-sign terms and condition validation function started  @author Kavya***********/
    if ($('#EnrollmentESignForm').length) { // here we are confirming the form is enrollment 2  based on the id [EnrollmentAddstep2Form]
        var $agree_term = $('#EnrollmentEsignTerms').attr('name');

    var $params = {
        debug: false, 
        rules: {}, 
        messages: {}
};

$params['rules'][$agree_term] = {
    "required": true
        };
$params['messages'][$agree_term] = {
    "required": '<div class="errorbox rateError"><div class="error-message">Please check this box if you want to proceed</div><div class="error-arrow"></div></div>'
};

        $("#EnrollmentESignForm").validate($params);
    }
    /****************E-sign terms and condition validation function ends*************************/

    /**************************  Partnership validatoin function starts here [@author ARJUN]***************/
    if ($('#partnershipForm').length) {//Here i am checking form exist or not
        /*********************** Default invalid validation for the partnership**********/
        $.validator.addMethod("defaultInvalid_partnership", function(value, element) {
            switch (element.value) {
                case "First Name*":
                    if (element.name == "data[Partnership][first_name]")
                        return false;
                    break;
                case "Last Name*":
                    if (element.name == "data[Partnership][last_name]")
                        return false;
                    break;
                case "E-mail*":
                    if (element.name == "data[Partnership][email]")
                        return false;
                    break;
                case "Phone*":
                    if (element.name == "data[Partnership][phone]")
                        return false;
                    break;
                case "Business Name*":
                    if (element.name == "data[Partnership][business_name]")
                        return false;
                    break;
                case "Service Address*":
                    if (element.name == "data[Partnership][service_address]")
                        return false;
                    break;
                case "City*":
                    if (element.name == "data[Partnership][city]")
                        return false;
                    break;
                case "State*":
                    if (element.name == "data[Partnership][state]")
                        return false;
                    break;
                case "Zip Code*":
                    if (element.name == "data[Partnership][zipcode]")
                        return false;
                    break;
                    /*case "Comments*":
                     if (element.name == "data[Partnership][description]")
                     return false;
                     break;*/
                default:
                    return true;
                    break;
            }
        });


        $('#partnershipForm').validate({
            rules: {
                'data[Partnership][first_name]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    lettersonly: true,
                    minlength: 3,
                    maxlength: 25
                },
                'data[Partnership][last_name]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    lettersonly: true,
                    minlength: 1,
                    maxlength: 25
                },
                'data[Partnership][email]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    email: true,
                    maxlength: 50
                },
                'data[Partnership][phone]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    phoneUS: true,
                    maxlength: 15
                },
                'data[Partnership][business_name]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    maxlength: 25
                },
                'data[Partnership][service_address]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    maxlength: 100
                },
                'data[Partnership][city]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    lettersonly: true,
                    maxlength: 25
                },
                'data[Partnership][state]': {
                    required: true,
                    defaultInvalid_partnership: true,
                },
                'data[Partnership][zipcode]': {
                    required: true,
                    defaultInvalid_partnership: true,
                    zipcodeUS: true,
                    maxlength: 10
                },
                'data[Partnership][description]': {
                    //required: true,
                    //defaultInvalid_partnership: true,
                    maxlength: 250
                }

            },
            messages: {
                'data[Partnership][first_name]': {
                    required: 'Please enter First Name',
                    defaultInvalid_partnership: 'Please enter First Name',
                    minlength: 'Minimum 3 characters',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Partnership][last_name]': {
                    required: 'Please enter Last Name',
                    defaultInvalid_partnership: 'Please enter Last Name',
                    minlength: 'Minimum 1 character',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Partnership][email]': {
                    required: 'Please enter E-mail',
                    defaultInvalid_partnership: 'Please enter E-mail',
                    email: 'Please enter valid E-mail',
                    maxlength: 'Maximum 50 characters'
                },
                'data[Partnership][phone]': {
                    required: 'Please enter Phone Number',
                    defaultInvalid_partnership: 'Please enter Phone Number',
                    phoneUS: 'Please enter valid Phone Number',
                    maxlength: 'Maximum 15 digits'
                },
                'data[Partnership][business_name]': {
                    required: 'Please enter Business Name',
                    defaultInvalid_partnership: 'Please enter Business Name',
                    maxlength: 'Maximum 25 characters'
                },
                'data[Partnership][service_address]': {
                    required: 'Please enter Service Address',
                    defaultInvalid_partnership: 'Please enter Service Address',
                    maxlength: 'Maximum 100 characters'
                },
                'data[Partnership][city]': {
                    required: 'Please enter City',
                    defaultInvalid_partnership: 'Please enter City',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Partnership][state]': {
                    required: 'Please select State',
                    defaultInvalid_partnership: 'Please select State',
                },
                'data[Partnership][zipcode]': {
                    required: 'Please enter Zip Code',
                    defaultInvalid_partnership: 'Please enter Zip Code',
                    zipcodeUS: 'Invalid Zip Code',
                    maxlength: 'Maximum limit exceeded'
                },
                'data[Partnership][description]': {
                    //required: 'Please enter Comments',
                    //defaultInvalid_partnership: 'Please enter Comments',
                    maxlength: 'Maximum 250 characters'
                }
            },
            submitHandler: function(form) {
                var submitflag = 1;
                /************************Captcha validation starts here****************************/
                if ($('#recaptcha_response_field').val() == '') {
                    $('.modelMessageWrappartnershp').html('<div class="modelMessageWrap"><div class="error">Please enter Captcha Value</div></div>');
                    //$('.modelMessageWrap').html('<div class="error">Please enter captcha</div>');
                    //  alert('please enter some thing in captcha');
                    return false;
                } else {
                    $('.loading_Div').show();
                    urlData = "/nes/en/enrollments/checkCaptcha";
                    postData = 'recaptcha_challenge=' + $('#recaptcha_challenge_field').val() + '&recaptcha_response=' + $('#recaptcha_response_field').val();
                    var msg1 = $.ajax({
                        type: "POST",
                        async: false,
                        url: urlData,
                        data: postData,
                        success: function(result) {
                            $('.loading_Div').hide();
                            if (result.indexOf('not a valid captcha') > -1) {
                                // $('.modelMessageWrap').html('<div class="error">Incorrect Captcha..!</div>');
                                $('.modelMessageWrappartnershp').html('<div class="modelMessageWrap"><div class="error">Incorrect Captcha Value</div></div>')
                                Recaptcha.reload();
                                submitflag = 0;
                                return false;
                            }

                        },
                        error: function(e) {
                            $('.loading_Div').hide();
                            $('.modelMessageWrap').html('<div class="error">Have some error, Please try again</div>');
                        }
                    }).responseText;
                    if (submitflag == 1)
                    {
                        form.submit();
                    }
                }
                /************************Captcha validation ends here****************************/

            }

        });
    }

    if ($('.BlueFormWrap').length) {
        $('.BlueFormWrap input').keyup(function() {
            checkingValueAndChangeColor2();
        });
        $('.BlueFormWrap input').change(function() {
            checkingValueAndChangeColor2();
        });
        $('.BlueFormWrap textarea').keyup(function() {
            checkingValueAndChangeColor2();
        });
        $('.BlueFormWrap textarea').change(function() {
            checkingValueAndChangeColor2();
        });
        $('.BlueFormWrap select').keyup(function() {
            checkingValueAndChangeColor2();
        });
        $('.BlueFormWrap select').change(function() {
            checkingValueAndChangeColor2();
        });
    }
    /**************************  Partnership validatoin function starts here***************/

    /**************************  Business validatoin function starts here [@author ARJUN]***************/
    if ($('#BusinessForm').length) {//Here i am checking form exist or not
        /*********************** Default invalid validation for the partnership**********/
        $.validator.addMethod("defaultInvalid_business", function(value, element) {
            switch (element.value) {
                case "First Name*":
                    if (element.name == "data[Business][first_name]")
                        return false;
                    break;
                case "Last Name*":
                    if (element.name == "data[Business][last_name]")
                        return false;
                    break;
                case "E-mail*":
                    if (element.name == "data[Business][email]")
                        return false;
                    break;
                case "Phone*":
                    if (element.name == "data[Business][phone]")
                        return false;
                    break;
                case "Business Name*":
                    if (element.name == "data[Business][business_name]")
                        return false;
                    break;
                case "Service Address*":
                    if (element.name == "data[Business][service_address]")
                        return false;
                    break;
                case "City*":
                    if (element.name == "data[Business][city]")
                        return false;
                    break;
                case "State*":
                    if (element.name == "data[Business][state]")
                        return false;
                    break;
                case "Zip Code*":
                    if (element.name == "data[Business][zipcode]")
                        return false;
                    break;
                    /*case "Comments*":
                     if (element.name == "data[Business][description]")
                     return false;
                     break;*/
                default:
                    return true;
                    break;
            }
        });

        $('#BusinessForm').validate({
            rules: {
                'data[Business][first_name]': {
                    required: true,
                    defaultInvalid_business: true,
                    lettersonly: true,
                    minlength: 3,
                    maxlength: 25
                },
                'data[Business][last_name]': {
                    required: true,
                    defaultInvalid_business: true,
                    lettersonly: true,
                    minlength: 1,
                    maxlength: 25
                },
                'data[Business][email]': {
                    required: true,
                    defaultInvalid_business: true,
                    email: true,
                    maxlength: 50
                },
                'data[Business][phone]': {
                    required: true,
                    defaultInvalid_business: true,
                    phoneUS: true,
                    maxlength: 15
                },
                'data[Business][business_name]': {
                    required: true,
                    defaultInvalid_business: true,
                    maxlength: 25
                },
                'data[Business][service_address]': {
                    required: true,
                    defaultInvalid_business: true,
                    maxlength: 100
                },
                'data[Business][city]': {
                    required: true,
                    defaultInvalid_business: true,
                    lettersonly: true,
                    maxlength: 25
                },
                'data[Business][state]': {
                    required: true,
                    defaultInvalid_business: true
                },
                'data[Business][zipcode]': {
                    required: true,
                    defaultInvalid_business: true,
                    zipcodeUS: true,
                    maxlength: 10
                },
                'data[Business][description]': {
                    //required: true,
                    //defaultInvalid_business: true,
                    maxlength: 250
                }

            },
            messages: {
                'data[Business][first_name]': {
                    required: 'Please enter First Name',
                    defaultInvalid_business: 'Please enter First Name',
                    minlength: 'Minimum 3 characters',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Business][last_name]': {
                    required: 'Please enter Last Name',
                    defaultInvalid_business: 'Please enter Last Name',
                    minlength: 'Minimum 1 character',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Business][email]': {
                    required: 'Please enter E-mail',
                    defaultInvalid_business: 'Please enter E-mail',
                    email: 'Please enter valid E-mail',
                    maxlength: 'Maximum 50 characters'
                },
                'data[Business][phone]': {
                    required: 'Please enter Phone Number',
                    defaultInvalid_business: 'Please enter Phone Number',
                    phoneUS: 'Please enter valid Phone Number',
                    maxlength: 'Maximum 15 digits'
                },
                'data[Business][business_name]': {
                    required: 'Please enter Business Name',
                    defaultInvalid_business: 'Please enter Business Name',
                    maxlength: 'Maximum 25 characters'
                },
                'data[Business][service_address]': {
                    required: 'Please enter Service address',
                    defaultInvalid_business: 'Please enter Service Address',
                    maxlength: 'Maximum 100 characters'
                },
                'data[Business][city]': {
                    required: 'Please enter City',
                    defaultInvalid_business: 'Please enter City',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Business][state]': {
                    required: 'Select State',
                    defaultInvalid_business: 'Select State'
                },
                'data[Business][zipcode]': {
                    required: 'Enter Zip Code',
                    defaultInvalid_business: 'Enter Zip Code',
                    zipcodeUS: 'Invalid Zip Code',
                    maxlength: 'Maximum limit exceeded'
                },
                'data[Business][description]': {
                    // required: 'Please enter Comments',
                    // defaultInvalid_business: 'Please enter Comments',
                    maxlength: 'Maximum 250 characters'
                }
            },
            submitHandler: function(form) {
                var submitflag = 1;
                /************************Captcha validation starts here****************************/
                if ($('#recaptcha_response_field').val() == '') {
                    $('.modelMessageWrapbusiness').html('<div class="modelMessageWrap"><div class="error">Please enter Captcha Value</div></div>');
                    //$('.modelMessageWrap').html('<div class="error">Please enter captcha</div>');
                    //alert('please enter some thing in captcha');
                    return false;
                } else {
                    $('.loading_Div').show();
                    urlData = "/nes/en/enrollments/checkCaptcha";
                    postData = 'recaptcha_challenge=' + $('#recaptcha_challenge_field').val() + '&recaptcha_response=' + $('#recaptcha_response_field').val();
                    var msg1 = $.ajax({
                        type: "POST",
                        async: false,
                        url: urlData,
                        data: postData,
                        success: function(result) {
                            $('.loading_Div').hide();
                            if (result.indexOf('not a valid captcha') > -1) {
                                // $('.modelMessageWrap').html('<div class="error">Incorrect Captcha..!</div>');
                                $('.modelMessageWrapbusiness').html('<div class="modelMessageWrap"><div class="error">Incorrect Captcha Value</div></div>')
                                Recaptcha.reload();
                                submitflag = 0;
                                return false;
                            }

                        },
                        error: function(e) {
                            $('.loading_Div').hide();
                            $('.modelMessageWrap').html('<div class="error">Have some error, Please try again</div>');
                        }
                    }).responseText;
                    if(submitflag==1)
                    {
                        form.submit();
                    }

                }
                /************************Captcha validation ends here****************************/

            }

        });
    }

    if ($('.business_page_form').length) {
        $('.business_page_form input').keyup(function() {
            checkingValueAndChangeColor3();
        });
        $('.business_page_form input').change(function() {
            checkingValueAndChangeColor3();
        });
        $('.business_page_form textarea').keyup(function() {
            checkingValueAndChangeColor3();
        });
        $('.business_page_form textarea').change(function() {
            checkingValueAndChangeColor3();
        });
        $('.business_page_form select').keyup(function() {
            checkingValueAndChangeColor3();
        });
        $('.business_page_form select').change(function() {
            checkingValueAndChangeColor3();
        });
    }

    /**************************  Partnership validatoin function starts here***************/


    /**************************  Customer Care validatoin function starts here [@author Kavya]***************/
    if ($('#CustomerForm').length) { //Here i am checking form exist or not
        /*********************** Default invalid validation for the customer care**********/
        $.validator.addMethod("defaultInvalid_customer", function(value, element) {
            switch (element.value) {
                case "Name*":
                    if (element.name == "data[Contact][name]")
                        return false;
                    break;
                case "E-mail*":
                    if (element.name == "data[Contact][email]")
                        return false;
                    break;
                case "Phone*":
                    if (element.name == "data[Contact][phone]")
                        return false;
                    break;
                default:
                    return true;
                    break;
            }
        });

        $('#CustomerForm').validate({
            rules: {
                'data[Contact][name]': {
                    required: true,
                    defaultInvalid_customer: true,
                    lettersonly: true,
                    minlength: 3,
                    maxlength: 25
                },
                'data[Contact][email]': {
                    required: true,
                    defaultInvalid_customer: true,
                    email: true,
                    maxlength: 50
                },
                'data[Contact][phone]': {
                    required: true,
                    defaultInvalid_customer: true,
                    phoneUS: true,
                    maxlength: 15
                },
                'data[Contact][comment]': {
                    //required: true,
                    //defaultInvalid_business: true,
                    maxlength: 250
                }

            },
            messages: {
                'data[Contact][name]': {
                    required: 'Please enter Name',
                    defaultInvalid_customer: 'Please enter Name',
                    minlength: 'Minimum 3 characters',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Contact][email]': {
                    required: 'Please enter E-mail',
                    defaultInvalid_customer: 'Please enter E-mail',
                    email: 'Please enter valid E-mail',
                    maxlength: 'Maximum 50 characters'
                },
                'data[Contact][phone]': {
                    required: 'Please enter Phone Number',
                    defaultInvalid_customer: 'Please enter Phone Number',
                    phoneUS: 'Please enter valid Phone Number',
                    maxlength: 'Maximum 15 digits'
                },
                'data[Contact][comment]': {
                    // required: 'Please enter Comments',
                    // defaultInvalid_business: 'Please enter Comments',
                    maxlength: 'Maximum 250 characters'
                }
            },
            submitHandler: function(form) {
                var submitflag = 1;
                /************************Captcha validation starts here****************************/
                if ($('#recaptcha_response_field').val() == '') {
                    $('.modelMessageWrapcontact').html('<div class="modelMessageWrap"><div class="error">Please enter Captcha Value</div></div>');
                    //$('.modelMessageWrap').html('<div class="error">Please enter captcha</div>');
                    //  alert('please enter some thing in captcha');
                    return false;
                } else {
                    $('.loading_Div').show();
                    urlData = "/nes/en/enrollments/checkCaptcha";
                    postData = 'recaptcha_challenge=' + $('#recaptcha_challenge_field').val() + '&recaptcha_response=' + $('#recaptcha_response_field').val();
                    var msg1 = $.ajax({
                        type: "POST",
                        async: false,
                        url: urlData,
                        data: postData,
                        success: function(result) {
                            $('.loading_Div').hide();
                            if (result.indexOf('not a valid captcha') > -1) {
                                // $('.modelMessageWrap').html('<div class="error">Incorrect Captcha..!</div>');
                                $('.modelMessageWrapcontact').html('<div class="modelMessageWrap"><div class="error">Incorrect Captcha Value</div></div>')
                                Recaptcha.reload();
                                submitflag = 0;
                                return false;
                            }

                        },
                        error: function(e) {
                            $('.loading_Div').hide();
                            $('.modelMessageWrap').html('<div class="error">Have some error, Please try again</div>');
                        }
                    }).responseText;
                    if (submitflag == 1)
                    {
                        form.submit();
                    }
                }
                /************************Captcha validation ends here****************************/

            }


        });
    }

    if ($('.customer_care_form').length) {
        $('.customer_care_form input').keyup(function() {
            checkingValueAndChangeColor1();
        });
        $('.customer_care_form input').change(function() {
            checkingValueAndChangeColor1();
        });
        $('.customer_care_form textarea').keyup(function() {
            checkingValueAndChangeColor1();
        });
        $('.customer_care_form textarea').change(function() {
            checkingValueAndChangeColor1();
        });
    }

    /************Zip Code form validation starts here  @Kavya******************************/

    if ($('#enrollmentPlanlistForm').length) {
        $.validator.addMethod("defaultInvalid_zipcode", function(value, element) {
            switch (element.value) {
                case "Zip Code*":
                    if (element.name == "data[enrollment][zipcode]")
                        return false;
                    break;

                default:
                    return true;
                    break;
            }
        });
        $('#enrollmentPlanlistForm').validate({
            rules: {
                'data[enrollment][zipcode]': {
                    required: true,
                    defaultInvalid_zipcode: true,                    
                    zipcodeUS: true,
                    maxlength: 10                        
                }
            },
            messages: {
                'data[enrollment][zipcode]': {
                    required: 'Please enter Zip Code',
                    defaultInvalid_zipcode: 'Please enter Zip Code',
                    zipcodeUS: 'Please enter valid Zip Code',
                    maxlength: 'Please enter valid Zip Code'
                }
            }
        });
    }

    /************************Zip Code validation ends here****************************/

    /************Zip Code form validation starts here  @Kavya******************************/
	if(accnt_field == 'Utility Choice Number*'){
		var account_msg = 'Please enter Utility Choice Number';
	}else if(accnt_field == 'Gas Agreement ID*'){
		var account_msg = 'Please enter Gas Agreement ID';
	}else{		
		var account_msg = 'Please enter Utility Account Number';
	}

    if ($('#EnrollmentServiceInformationForm').length) {
        $.validator.addMethod("defaultInvalid_enrollment", function(value, element) {
            switch (element.value) {
                case "First Name*":
                    if (element.name == "data[Enrollment][first_name]")
                        return false;
                    break;
                case "Last Name*":
                    if (element.name == "data[Enrollment][last_name]")
                        return false;
                    break;
                case "E-mail*":
                    if (element.name == "data[Enrollment][email]")
                        return false;
                    break;
                    
                case "Phone*":
                    if (element.name == "data[Enrollment][phone]")
                        return false;
                    break;
                
                case "Street Address*":
                    if (element.name == "data[Enrollment][service_street]")
                        return false;
                    break;
                /*case "Apt. or Suite #":
                    if (element.name == "data[Enrollment][service_apt]")
                        return false;
                    break;*/
                case "Address Type*":
                    if (element.name == "data[Enrollment][premise_type]")
                        return false;
                    break;
                case accnt_field:
                    if (element.name == "data[Enrollment][account_number]")
                        return false;
                    break;
                case "Street Address*":
                    if (element.name == "data[Enrollment][billing_street]")
                        return false;
                    break;
                /*case "Apt. or Suite #":
                    if (element.name == "data[Enrollment][billing_apt]")
                        return false;
                    break;*/
                case "City*":
                    if (element.name == "data[Enrollment][billing_city]")
                        return false;
                    break;
                case "State*":
                    if (element.name == "data[Enrollment][billing_state]")
                        return false;
                    break;
                case "Zip Code*":
                    if (element.name == "data[Enrollment][billing_zipcode]")
                        return false;
                    break;

                default:
                    return true;
                    break;
            }
        });
        $('#EnrollmentServiceInformationForm').validate({
            rules: {
                'data[Enrollment][first_name]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    lettersonly: true,
                    maxlength: 25,
                    //minlength: 3

                },
                'data[Enrollment][last_name]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    lettersonly: true,
                    maxlength: 25,
                    minlength: 1
                },
                'data[Enrollment][email]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    email: true,
                    maxlength: 50
                },
                'data[Enrollment][phone]': {
					required: true,
                    defaultInvalid_enrollment: true,
                    //phoneUS: true,
                    number:true,
                    minlength: 10,
                    maxlength: 10
                },
                'data[Enrollment][service_street]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    maxlength: 250
                },
                'data[Enrollment][service_apt]': {
                    //required: true,
                    //defaultInvalid_enrollment: true,
                    maxlength: 15
                },
                'data[Enrollment][premise_type]': {
                    required: true,
                    defaultInvalid_enrollment: true
                },
                'data[Enrollment][account_number]': {
                    required: true,
                    defaultInvalid_enrollment:true,
                   // numeric:true,
                    minlength:acnt_num_low,                        
                    maxlength:acnt_num_max
                },
                'data[Enrollment][billing_street]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    maxlength: 250
                },
                'data[Enrollment][billing_apt]': {
                    //required: true,
                    //defaultInvalid_enrollment: true,
                    maxlength: 15
                },
                'data[Enrollment][billing_city]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    lettersonly: true,
                    maxlength: 25
                },
                'data[Enrollment][billing_state]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    lettersonly: true
                },
                'data[Enrollment][billing_zipcode]': {
                    required: true,
                    defaultInvalid_enrollment: true,
                    zipcodeUS: true,
                    maxlength: 10
                }
            },
            messages: {
                'data[Enrollment][first_name]': {
                    required: 'Please enter First Name',
                    defaultInvalid_enrollment: 'Please enter First Name',
                    maxlength: 'Maximum 25 characters',
                    //minlength: 'Minimum 3 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Enrollment][last_name]': {
                    required: 'Please enter Last Name',
                    defaultInvalid_enrollment: 'Please enter Last Name',
                    maxlength: 'Maximum 25 characters',
                    minlength: 'Minimum 1 character',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Enrollment][email]': {
                    required: 'Please enter E-mail',
                    defaultInvalid_enrollment: 'Please enter E-mail',
                    email: 'Please enter valid E-mail',
                    maxlength: 'Maximum 50 characters'
                },
                'data[Enrollment][phone]': {
					required: 'Please enter Phone Number',
                    defaultInvalid_enrollment: 'Please enter Phone Number',
                    number: 'Please enter 10 digits with no dashes',
                    maxlength: 'Maximum 10 digits,no dashes', 
                    minlength:'Minimum 10 digits',
                    
                },
                'data[Enrollment][service_street]': {
                    required: 'Please enter Street Address',
                    defaultInvalid_enrollment: 'Please enter Street Address',
                    maxlength: 'Maximum 250 characters'
                },
                'data[Enrollment][service_apt]': {
                    //required: 'Please enter Apt. or Suite #',
                    //defaultInvalid_enrollment: 'Please enter Apt. or Suite #',
                    maxlength: 'Maximum 15 characters'
                },
                'data[Enrollment][premise_type]': {
                    required: 'Select Address Type',
                    defaultInvalid_enrollment: 'Select Address Type'
                },
                'data[Enrollment][account_number]': {
                    required: account_msg,
                    defaultInvalid_enrollment: account_msg,
                   // numeric : 'Please enter numbers only',
                    maxlength : 'Maximum '+acnt_num_max+' digits',
                    minlength : 'Minimum '+acnt_num_low+' digits',
                },
                'data[Enrollment][billing_street]': {
                    required: 'Please enter Street Address',
                    defaultInvalid_enrollment: 'Please enter Street Address',
                    maxlength: 'Maximum 250 characters'
                },
                'data[Enrollment][billing_apt]': {
                    //required: 'Please enter Apt. or Suite #',
                    //defaultInvalid_enrollment: 'Please enter Apt. or Suite #',
                    maxlength: 'Maximum 15 characters'
                },
                'data[Enrollment][billing_city]': {
                    required: 'Please enter City',
                    defaultInvalid_enrollment: 'Please enter City',
                    maxlength: 'Maximum 25 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Enrollment][billing_state]': {
                    required: 'Select State',
                    defaultInvalid_enrollment: 'Select State',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Enrollment][billing_zipcode]': {
                    required: 'Please enter Zip Code',
                    defaultInvalid_enrollment: 'Please enter Zip Code',
                    maxlength: 'Maximum limit exceeded',
                    zipcodeUS: 'Invalid Zip Code',
                }
            }
        });
    }

    /************************Zip Code validation ends here****************************/

    /************Contact us form validation starts here  @ARJUN******************************/
    if ($('#Contactlink').length) {
        $.validator.addMethod("defaultInvalid_contact", function(value, element) {
            switch (element.value) {
                case "Name*":
                    if (element.name == "data[Contactlink][names]")
                        return false;
                    break;
                case "E-mail*":
                    if (element.name == "data[Contactlink][email]")
                        return false;
                    break;
                case "Phone*":
                    if (element.name == "data[Contactlink][phoneno]")
                        return false;
                    break;
                case "Zip Code*":
                    if (element.name == "data[Contactlink][zipcode]")
                        return false;
                    break;

                default:
                    return true;
                    break;
            }
        });
        $('#Contactlink').validate({
            rules: {
                'data[Contactlink][names]': {
                    required: true,
                    defaultInvalid_contact: true,
                    lettersonly: true,
                    minlength: 3,
                    maxlength: 50
                },
                'data[Contactlink][email]': {
                    required: true,
                    defaultInvalid_contact: true,
                    email: true,
                    maxlength: 50
                },
                'data[Contactlink][phoneno]': {
                    required: true,
                    defaultInvalid_contact: true,
                    maxlength: 15,
                    phoneUS: true
                },
                'data[Contactlink][zipcode]': {
                    required: true,
                    defaultInvalid_contact: true,
                    maxlength: 10,
                    zipcodeUS: true

                }

            },
            messages: {
                'data[Contactlink][names]': {
                    required: 'Please enter Name',
                    defaultInvalid_contact: 'Please enter Name',
                    minlength: 'Minimum 3 characters',
                    maxlength: 'Maximum 50 characters',
                    lettersonly: 'Please enter alphabets only'
                },
                'data[Contactlink][email]': {
                    required: 'Please enter E-mail',
                    defaultInvalid_contact: 'Please enter E-mail',
                    email: 'Please enter valid E-mail',
                    maxlength: 'Maximum 50 characters'
                },
                'data[Contactlink][phoneno]': {
                    required: 'Please enter Phone Number',
                    defaultInvalid_contact: 'Please enter Phone Number',
                    phoneUS: 'Please enter valid Phone Number',
                    maxlength: 'Maximum 15 digits only'

                },
                'data[Contactlink][zipcode]': {
                    required: 'Please enter Zip Code',
                    defaultInvalid_contact: 'Please enter Zip Code',
                    zipcodeUS: 'Please enter valid Zip Code',
                    maxlength: 'Maximum limit exceeded'
                }
            },
            submitHandler: function(form) {
                /************************Captcha validation starts here @ARJUN****************************
                 if($('#recaptcha_response_field').val()==''){
                 $('.rightContactLink .modelMessageWrap').html('<div class="error">Please enter captcha</div>');
                 //  alert('please enter some thing in captcha');
                 return false;
                 }else{
                 urlData = "/NES/en/enrollments/checkCaptcha";
                 postData = 'recaptcha_challenge=' + $('#recaptcha_challenge_field').val()+'&recaptcha_response=' + $('#recaptcha_response_field').val();
                 var msg1 = $.ajax({
                 type: "POST",
                 async: false,
                 url: urlData,
                 data: postData,
                 success: function(result){		
                 if(result.indexOf('not a valid captcha')>-1){
                 $('.rightContactLink .modelMessageWrap').html('<div class="error">Incorrect Captcha..!</div>');
                 Recaptcha.reload();
                 return false;
                 }
                 
                 },
                 error: function(e){							   
                 $('.rightContactLink .modelMessageWrap').html('<div class="error">Have some error, Please try again</div>');
                 }
                 }).responseText;
                 }
                 /************************Captcha validation ends here @ARJUN****************************/

                urlData = "/nes/en/enrollments/contactus";
                postData = 'Contactlink_names=' + $('#Contactlink_names').val() + '&Contactlink_email=' + $('#Contactlink_email').val() + '&Contactlink_phoneno=' + $('#Contactlink_phoneno').val() + '&Contactlink_zipcode=' + $('#Contactlink_zipcode').val();
                var msg = $.ajax({
                    type: "POST",
                    async: false,
                    url: urlData,
                    data: postData,
                    success: function(result) {
                        if (result.indexOf('Thank you for submitting the details') > -1) {
                            $('.rightContactLinkNew .modelMessageWrap').html('<div class="success">' + result + '</div>');
                            $('#Contactlink').trigger("reset");
                            $('.rightContactLinkNew .TextBoxSignUp').css('color', '#979799');
                        } else {
                            $('.rightContactLink .modelMessageWrap').html('<div class="error">Have some error, Please try again</div>');
                        }

                    },
                    error: function(e) {
                        $('.rightContactLinkNew .modelMessageWrap').html('<div class="error">Have some error, Please try again</div>');
                    }
                }).responseText;
                return false;
            }

        });
    }
    /************Contact us form validation ends here ******************************/
    /**************Error message toggle option starts here @ARJUN***********/
    if ($('.modelMessageWrap').length) {
        $('.modelMessageWrap').click(function() {
            $('.modelMessageWrap').html('');
        });
    }
    /**************Error message toggle option starts here***********/

    /***************Accordion replace with jqery toggle startes here**************************/
    if ($('.FAQHead').length) {
        $('.FAQAccordianTxt').hide();
        $('.FAQHead').click(function() {
            if ($(this).attr('class') == 'FAQHead') {
                $(this).addClass('FAQActive');
            } else {
                $(this).removeClass('FAQActive');
            }
            $(this).next('.FAQAccordianTxt').toggle('fast', 'linear');


        });

    }
    /****************Accordion replace with jqery toggle ends here @ARJUN***********************/
    /******************************Captcha started here****************************/
    if ($('#recaptcha_div').length) {
        function showRecaptcha(element) {
            Recaptcha.create("6LfrTeISAAAAAAX1GmwXzA7uo_MUdydIDrMIrgXe", 'recaptcha_div', {
                theme: "red"/*,
             callback: Recaptcha.focus_response_field*/
            });
        }

        showRecaptcha('recaptcha_div');
    }

    /******************************Captcha ends here****************************/
    //********** text box focus color changes in contact right side form started here @ARJUN *************//

    if ($('.rightContactLinkNew').length) {
        $('.rightContactLinkNew input').keyup(function() {
            checkingValueAndChangeColor();
        });
        $('.rightContactLinkNew input').change(function() {
            checkingValueAndChangeColor();
        });
    }
    //********** text box focus color changes in contact right side form ends here @ARJUN *************//

    /************************** Service Information page font color starts here **************************/

    if ($('.enrollment_outer').length) {
        $('.enrollment_outer input').keyup(function() {
            checkingValueAndChangeColor4();
        });
        $('.enrollment_outer input').change(function() {
            checkingValueAndChangeColor4();
        });
        $('.enrollment_outer select').keyup(function() {
            checkingValueAndChangeColor4();
        });
        $('.enrollment_outer select').change(function() {
            checkingValueAndChangeColor4();
        });
    }
/************************** Service Information page font color ends here **************************/

    if ($('.SignUpBoxWrap').length) {
        $('.SignUpBoxWrap input').keyup(function() {
            checkingValueAndChangeColor5();
        });
        $('.SignUpBoxWrap input').change(function() {
            checkingValueAndChangeColor5();
        });        
    }

    if ($('.planlist_form').length) {
        $('.planlist_form input').keyup(function() {
            checkingValueAndChangeColor6();
        });
        $('.planlist_form input').change(function() {
            checkingValueAndChangeColor6();
        });        
    }
    if ($('.planlist_form').length) {        
            checkingValueAndChangeColor6();             
    }



});
/****************Right side contact form element color changes started here @ARJUN***************/
function checkingValueAndChangeColor() {
    if ($('#Contactlink_names').val() == 'Name*' || $('#Contactlink_names').val() == '') {
        $('#Contactlink_names').css('color', '#979799');
    } else {
        $('#Contactlink_names').css('color', '#000000');
    }
    if ($('#Contactlink_email').val() == 'E-mail*' || $('#Contactlink_email').val() == '') {
        $('#Contactlink_email').css('color', '#979799');
    } else {
        $('#Contactlink_email').css('color', '#000000');
    }
    if ($('#Contactlink_phoneno').val() == 'Phone*' || $('#Contactlink_phoneno').val() == '') {
        $('#Contactlink_phoneno').css('color', '#979799');
    } else {
        $('#Contactlink_phoneno').css('color', '#000000');
    }
    if ($('#Contactlink_zipcode').val() == 'Zip Code*' || $('#Contactlink_zipcode').val() == '') {
        $('#Contactlink_zipcode').css('color', '#979799');
    } else {
        $('#Contactlink_zipcode').css('color', '#000000');
    }
 }

/****************Right side contact form element color changes ends here ***************/


/****************Contact Us/Customer Care form element color changes started here @Kavya***************/
function checkingValueAndChangeColor1() {
    if ($('#ContactName').val() == 'Name*' || $('#ContactName').val() == '') {
        $('#ContactName').css('color', '#979799');
    } else {
        $('#ContactName').css('color', '#000000');
    }
    if ($('#ContactEmail').val() == 'E-mail*' || $('#ContactEmail').val() == '') {
        $('#ContactEmail').css('color', '#979799');
    } else {
        $('#ContactEmail').css('color', '#000000');
    }
    if ($('#ContactPhone').val() == 'Phone*' || $('#ContactPhone').val() == '') {
        $('#ContactPhone').css('color', '#979799');
    } else {
        $('#ContactPhone').css('color', '#000000');
    }
    if ($('#ContactComment').val() == 'Comments' || $('#ContactComment').val() == '') {
        $('#ContactComment').css('color', '#979799');
    } else {
        $('#ContactComment').css('color', '#000000');
    }
}

/****************Contact Us/Customer Care form element color changes ends here ***************/


/****************Partnership form element color changes started here @Kavya***************/
function checkingValueAndChangeColor2() {
    if ($('#PartnershipFirstName').val() == 'First Name*' || $('#PartnershipFirstName').val() == '') {
        $('#PartnershipFirstName').css('color', '#979799');
    } else {
        $('#PartnershipFirstName').css('color', '#000000');
    }
    if ($('#PartnershipLastName').val() == 'Last Name*' || $('#PartnershipLastName').val() == '') {
        $('#PartnershipLastName').css('color', '#979799');
    } else {
        $('#PartnershipLastName').css('color', '#000000');
    }
    if ($('#PartnershipEmail').val() == 'E-mail*' || $('#PartnershipEmail').val() == '') {
        $('#PartnershipEmail').css('color', '#979799');
    } else {
        $('#PartnershipEmail').css('color', '#000000');
    }
    if ($('#PartnershipPhone').val() == 'Phone*' || $('#PartnershipPhone').val() == '') {
        $('#PartnershipPhone').css('color', '#979799');
    } else {
        $('#PartnershipPhone').css('color', '#000000');
    }
    if ($('#PartnershipBusinessName').val() == 'Business Name*' || $('#PartnershipBusinessName').val() == '') {
        $('#PartnershipBusinessName').css('color', '#979799');
    } else {
        $('#PartnershipBusinessName').css('color', '#000000');
    }
    if ($('#PartnershipServiceAddress').val() == 'Service Address*' || $('#PartnershipServiceAddress').val() == '') {
        $('#PartnershipServiceAddress').css('color', '#979799');
    } else {
        $('#PartnershipServiceAddress').css('color', '#000000');
    }
    if ($('#PartnershipCity').val() == 'City*' || $('#PartnershipCity').val() == '') {
        $('#PartnershipCity').css('color', '#979799');
    } else {
        $('#PartnershipCity').css('color', '#000000');
    }
    if ($('#PartnershipState').val() == 'State*' || $('#PartnershipState').val() == '') {
        $('#PartnershipState').css('color', '#979799');
    } else {
        $('#PartnershipState').css('color', '#000000');
    }
    if ($('#PartnershipZipcode').val() == 'Zip Code*' || $('#PartnershipZipcode').val() == '') {
        $('#PartnershipZipcode').css('color', '#979799');
    } else {
        $('#PartnershipZipcode').css('color', '#000000');
    }
    if ($('#PartnershipDescription').val() == 'Comments' || $('#PartnershipDescription').val() == '') {
        $('#PartnershipDescription').css('color', '#979799');
    } else {
        $('#PartnershipDescription').css('color', '#000000');
    }
}

/****************Partnership form element color changes ends here ***************/


/****************Business form element color changes started here @Kavya***************/

function checkingValueAndChangeColor3() {
    if ($('#BusinessFirstName').val() == 'First Name*' || $('#BusinessFirstName').val() == '') {
        $('#BusinessFirstName').css('color', '#979799');
    } else {
        $('#BusinessFirstName').css('color', '#000000');
    }
    if ($('#BusinessLastName').val() == 'Last Name*' || $('#BusinessLastName').val() == '') {
        $('#BusinessLastName').css('color', '#979799');
    } else {
        $('#BusinessLastName').css('color', '#000000');
    }
    if ($('#BusinessEmail').val() == 'E-mail*' || $('#BusinessEmail').val() == '') {
        $('#BusinessEmail').css('color', '#979799');
    } else {
        $('#BusinessEmail').css('color', '#000000');
    }
    if ($('#BusinessPhone').val() == 'Phone*' || $('#BusinessPhone').val() == '') {
        $('#BusinessPhone').css('color', '#979799');
    } else {
        $('#BusinessPhone').css('color', '#000000');
    }
    if ($('#BusinessBusinessName').val() == 'Business Name*' || $('#BusinessBusinessName').val() == '') {
        $('#BusinessBusinessName').css('color', '#979799');
    } else {
        $('#BusinessBusinessName').css('color', '#000000');
    }
    if ($('#BusinessServiceAddress').val() == 'Service Address*' || $('#BusinessServiceAddress').val() == '') {
        $('#BusinessServiceAddress').css('color', '#979799');
    } else {
        $('#BusinessServiceAddress').css('color', '#000000');
    }
    if ($('#BusinessCity').val() == 'City*' || $('#BusinessCity').val() == '') {
        $('#BusinessCity').css('color', '#979799');
    } else {
        $('#BusinessCity').css('color', '#000000');
    }
    if ($('#BusinessState').val() == 'State*' || $('#BusinessState').val() == '') {
        $('#BusinessState').css('color', '#979799');
    } else {
        $('#BusinessState').css('color', '#000000');
    }
    if ($('#BusinessZipcode').val() == 'Zip Code*' || $('#BusinessZipcode').val() == '') {
        $('#BusinessZipcode').css('color', '#979799');
    } else {
        $('#BusinessZipcode').css('color', '#000000');
    }
    if ($('#BusinessDescription').val() == 'Comments' || $('#BusinessDescription').val() == '') {
        $('#BusinessDescription').css('color', '#979799');
    } else {
        $('#BusinessDescription').css('color', '#000000');
    }
}

/****************Business form element color changes ends here ***************/

/****************Service Information form element color changes started here @Kavya***************/

function checkingValueAndChangeColor4() {
    if ($('#EnrollmentFirstName').val() == 'First Name*' || $('#EnrollmentFirstName').val() == '') {
        $('#EnrollmentFirstName').css('color', '#979799');
    } else {
        $('#EnrollmentFirstName').css('color', '#000000');
    }
    if ($('#EnrollmentLastName').val() == 'Last Name*' || $('#EnrollmentLastName').val() == '') {
        $('#EnrollmentLastName').css('color', '#979799');
    } else {
        $('#EnrollmentLastName').css('color', '#000000');
    }
    if ($('#EnrollmentEmail').val() == 'E-mail*' || $('#EnrollmentEmail').val() == '') {
        $('#EnrollmentEmail').css('color', '#979799');
    } else {
        $('#EnrollmentEmail').css('color', '#000000');
    }
    if ($('#EnrollmentPhone').val() == 'Phone*' || $('#EnrollmentPhone').val() == '') {
        $('#EnrollmentPhone').css('color', '#979799');
    } else {
        $('#EnrollmentPhone').css('color', '#000000');
    }

    if ($('#EnrollmentServiceStreet').val() == 'Street Address*' || $('#EnrollmentServiceStreet').val() == '') {
        $('#EnrollmentServiceStreet').css('color', '#979799');
    } else {
        $('#EnrollmentServiceStreet').css('color', '#000000');
    }
    if ($('#EnrollmentServiceApt').val() == 'Apt. or Suite #' || $('#EnrollmentServiceApt').val() == '') {
        $('#EnrollmentServiceApt').css('color', '#979799');
    } else {
        $('#EnrollmentServiceApt').css('color', '#000000');
    }
    if ($('#EnrollmentServiceCity').val() == 'City*' || $('#EnrollmentServiceCity').val() == '') {
        $('#EnrollmentServiceCity').css('color', '#979799');
    } else {
        $('#EnrollmentServiceCity').css('color', '#000000');
    }
    if ($('#EnrollmentServiceState').val() == 'State*' || $('#EnrollmentServiceState').val() == '') {
        $('#EnrollmentServiceState').css('color', '#979799');
    } else {
        $('#EnrollmentServiceState').css('color', '#000000');
    }
    if ($('#EnrollmentServiceZipcode').val() == 'Zip Code*' || $('#EnrollmentServiceZipcode').val() == '') {
        $('#EnrollmentServiceZipcode').css('color', '#979799');
    } else {
        $('#EnrollmentServiceZipcode').css('color', '#000000');
    }

    if ($('#EnrollmentPremiseType').val() == 'Address Type*' || $('#EnrollmentPremiseType').val() == '') {
        $('#EnrollmentPremiseType').css('color', '#979799');
    } else {
        $('#EnrollmentPremiseType').css('color', '#000000');
    }

    if ($('#EnrollmentAccountNumber').val() == accnt_field || $('#EnrollmentAccountNumber').val() == '') {
        $('#EnrollmentAccountNumber').css('color', '#979799');
    } else {
        $('#EnrollmentAccountNumber').css('color', '#000000');
    }

    if ($('#EnrollmentBillingStreet').val() == 'Street Address*' || $('#EnrollmentBillingStreet').val() == '') {
        $('#EnrollmentBillingStreet').css('color', '#979799');
    } else {
        $('#EnrollmentBillingStreet').css('color', '#000000');
    }
    if ($('#EnrollmentBillingApt').val() == 'Apt. or Suite #' || $('#EnrollmentBillingApt').val() == '') {
        $('#EnrollmentBillingApt').css('color', '#979799');
    } else {
        $('#EnrollmentBillingApt').css('color', '#000000');
    }
    if ($('#EnrollmentBillingCity').val() == 'City*' || $('#EnrollmentBillingCity').val() == '') {
        $('#EnrollmentBillingCity').css('color', '#979799');
    } else {
        $('#EnrollmentBillingCity').css('color', '#000000');
    }
    if ($('#EnrollmentBillingState').val() == 'State*' || $('#EnrollmentBillingState').val() == '') {
        $('#EnrollmentBillingState').css('color', '#979799');
    } else {
        $('#EnrollmentBillingState').css('color', '#000000');
    }
    if ($('#EnrollmentBillingZipcode').val() == 'Zip Code*' || $('#EnrollmentBillingZipcode').val() == '') {
        $('#EnrollmentBillingZipcode').css('color', '#979799');
    } else {
        $('#EnrollmentBillingZipcode').css('color', '#000000');
    }


}

/****************Service Information form element color changes ends here ***************/

/****************Sign Up form element color changes started here @Kavya***************/
function checkingValueAndChangeColor5() {
    if ($('#EnrollmentZipcode').val() == 'Zip Code*' || $('#EnrollmentZipcode').val() == '') {
        $('#EnrollmentZipcode').css('color', '#979799');
    } else {
        $('#EnrollmentZipcode').css('color', '#000000');
    }     
}

/****************Sign Up form element color changes ends here ***************/


/****************Planlist zip code form element color changes started here @Kavya***************/
function checkingValueAndChangeColor6() {
    if ($('#enrollmentZipcode').val() == 'Zip Code*' || $('#enrollmentZipcode').val() == '') {
        $('#enrollmentZipcode').css('color', '#979799');
    } else {
        $('#enrollmentZipcode').css('color', '#000000');
    }     
}

/****************Planlist zip code form element color changes ends here ***************/


//Function return the signupForm content with validation containter @ARJUN
function signUpPage() {
    return '<div class="SignUpBoxHead">' +
            '<a class="ViewRateBtn" href="#">' +
            '<img src="../images/transparent.png" />' +
            '</a>' +
            '<a class="BenefitsBtn" href="#">' +
            '<img src="../images/transparent.png" />' +
            '</a>' +
            '</div>' +
            '<div class="SignUpBox">' +
            '<div class="SignupSec">' +
            '<h2>Sign Up Today!</h2>' +
            '<div class="container">' + /****** this container for the error display on the form***********/
            '<ol>' +
            '</ol>' +
            '</div>' +
            '<form action="/nes/en/enrollments/planlist" id="signUpForm" method="post">' +
            '<input class="TxtBox" id="EnrollmentZipcode" name="data[enrollment][zipcode]" placeholder="Zip Code*" type="text" />' +
            '<input class="TxtBox" name="" type="text" value="Promo Code" />' +
            '<div class="registerOnline">*required field</div>' +
            '<div class="OptionSelect">' +
            '<span><input  style="float:left; margin-right:2px" type="radio" value="Residential" name="data[enrollment][typeofplan]" id="" /><strong>Home</strong></span>' +
            '<span><input  style="float:left; margin-right:2px" type="radio" value="Commercial" name="data[enrollment][typeofplan]" id="" /><strong>Business</strong></span></div>' +
            '<div class="SignUpAction"><input class="Enter" name="" type="submit" value="Enter" /></div>' +
            '</form>' +
            '</div>' +
            '</div>';
}


/***********Function for  return  contact link @ARJUN  *****/
function contactlink() {
    return  '<div class="rightContactLink">' +
            '<div class="SignupSec">' +
            '<h2>Interested in Enrolling? Contact Us Now!</h2></div>' +
            '<div class="modelMessageWrap"></div>' +
            '<form action="/nes/en/enrollments/contactus" id="Contactlink" name="Contactlink" method="post">' +
            '<div class="TxtRow"><input  type="text" value="Name*" name="data[Contactlink][names]" id="Contactlink_names" maxlength="50" placeholder="Name*" class="TextBox" onfocus="if(this.value == ' + "'Name*'" + '){ this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + '){ this.value=' + "'Name*'" + '; }" tabindex="20" /></div>' +
            '<div class="TxtRow"><input   type="text" value="E-mail*" name="data[Contactlink][email]" id="Contactlink_email"  maxlength="50" placeholder="E-mail*" class="TextBox" onfocus="if(this.value == ' + "'E-mail*'" + ') { this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + ') { this.value=' + "'E-mail*'" + '; }" tabindex="22"/></div>' +
            '<div class="TxtRow"><input   type="text" value="Phone*" name="data[Contactlink][phoneno]" id="Contactlink_phoneno" maxlength="15" placeholder="Phone*" class="TextBox" onfocus="if(this.value == ' + "'Phone*'" + ') { this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + ') { this.value=' + "'Phone*'" + '; }" tabindex="23"/></div>' +
            '<div class="TxtRow"><input  type="text" value="Zip Code*" name="data[Contactlink][zipcode]" id="Contactlink_zipcode" maxlength="10" placeholder="Zip code*" class="TextBox" onfocus="if(this.value == ' + "'Zip Code*'" + ') { this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + ') { this.value=' + "'Zip Code*'" + '; }" tabindex="24" /></div>' +
            '<div><p style="color:#95969a;font-style:italic;"><b>*</b>Required field</p><input  class="Enter" type="submit" value="Submit" tabindex="24"/></div>' +
            '</form>' +
            '</div>';
}


/***********Function for  return  contact link as per New Design @ARJUN*****/
function contactlinkNew() {
    return  '<div class="rightContactLinkNew">' +
            '<div class="rightWrapToggleBtn"><a class="ContactBtn righFromBtn" href="javascript:void()">Contact</a>' +
            '<a class="BenefitsBtn righFromBtn" href="javascript:void()">Benefits</a><div class="clear"></div></div>' +
            '<div class="contactWrap"><div class="contactInnerWrap"><div class="SignupSec">' +
            '<h2>Interested in <br/>Enrolling? <br/>Contact Us Now!</h2></div>' +
            '<div class="modelMessageWrap"></div>' +
            '<form action="/nes/en/enrollments/contactus" id="Contactlink" name="Contactlink" method="post">' +
            '<div class="TxtRow"><input  type="text" value="Name*" name="data[Contactlink][names]" id="Contactlink_names" maxlength="50" placeholder="Name*" class="TextBoxSignUp" onfocus="if(this.value == ' + "'Name*'" + '){ this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + '){ this.value=' + "'Name*'" + '; }" tabindex="20" /></div>' +
            '<div class="TxtRow"><input   type="text" value="E-mail*" name="data[Contactlink][email]" id="Contactlink_email"  maxlength="50" placeholder="E-mail*" class="TextBoxSignUp" onfocus="if(this.value == ' + "'E-mail*'" + ') { this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + ') { this.value=' + "'E-mail*'" + '; }" tabindex="22"/></div>' +
            '<div class="TxtRow"><input   type="text" value="Phone*" name="data[Contactlink][phoneno]" id="Contactlink_phoneno" maxlength="15" placeholder="Phone*" class="TextBoxSignUp" onfocus="if(this.value == ' + "'Phone*'" + ') { this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + ') { this.value=' + "'Phone*'" + '; }" tabindex="23"/></div>' +
            '<div class="TxtRow"><input  type="text" value="Zip Code*" name="data[Contactlink][zipcode]" id="Contactlink_zipcode" maxlength="10" placeholder="Zip Code*" class="TextBoxSignUp" onfocus="if(this.value == ' + "'Zip Code*'" + ') { this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + ') { this.value=' + "'Zip Code*'" + '; }" tabindex="24" /></div>' +
            '<div style="float:left;width:100%;"><p style="color:#FFF;font-style:italic;font-size:9px; padding-bottom:0;"><b>*</b>Required field</p><input  class="Enter" type="submit" value="Submit" tabindex="24"/></div>' +
            '</form><div class="clear"></div></div></div>' +
            '<div class="benifitWrap"><div class="BenifitInnerWrap">' +
            '<ul><li>Competitive energy plans</li>' +
            '<li>Quick and simple enrollments</li>' +
            '<li>No service interruption to switch</li>' +
            '<li>Excellent customer service</li></ul>' +
            '</div>' +
            '</div>';


}


function signUpPageNew(){
    return  '<div class="rightContactLinkNew">' +
    '<div class="rightWrapToggleBtn"><a class="ContactBtn righFromBtn" href="javascript:void()">Contact</a>' +
    '<a class="BenefitsBtn righFromBtn" href="javascript:void()">Benefits</a><div class="clear"></div></div>' +
    '<div class="contactWrap"><div class="contactInnerWrap"><div class="SignupSec">' +
    '<h2>Sign Up Today !</h2></div>' +
    '<div class="modelMessageWrap"></div>' +
    '<div class="today_signupform">' +
    '<div class="container">' + /****** this container for the error display on the form***********/
    '<ol>' +
    '</ol>' +
    '</div>' +
    '<form action="/nes/en/enrollments/planlist" id="signUpForm" method="post" >' +
    '<input class="TxtBox" id="EnrollmentZipcode" name="data[enrollment][zipcode]" placeholder="Zip Code*" value="Zip Code*" maxlength=5 type="text"  onfocus="if(this.value == ' + "'Zip Code*'" + '){ this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + '){ this.value=' + "'Zip Code*'" + '; }" />' +
    '<input class="TxtBox signup_two" name="" type="text" value="Promo Code" />' +
    '<div class="registerOnline">*required field</div>' +
    '<div class="OptionSelect">' +
    '<span><input  style="margin-right:2px" type="radio" value="Residential" name="data[enrollment][typeofplan]" id="" checked><strong>Home</strong></span>' +
    '<span><input  style="margin-right:2px" type="radio" value="Commercial" name="data[enrollment][typeofplan]" id=""><strong>Business</strong></span></div>' +
    '<div class="SignUpAction"><input class="Enter" name="" type="submit" value="Enter" /></div>' +
    '</form>'+
    '<div class="clear"></div></div></div></div>'+
    '<div class="benifitWrap"><div class="BenifitInnerWrap" style="min-height:179px;">'+
    '<ul><li>Competitive energy plans</li>'+
    '<li>Quick and simple enrollments</li>'+
    '<li>No service interruption to switch</li>'+
    '<li>Excellent customer service</li></ul>'+
    '</div>'+
    '</div>';
}
    
function signupwidget()
{
	return '<form action="/nes/en/enrollments/planlist" id="signUpForm" method="post">'+
'<div id="widget-login-container">'+
'<div id="widget-inner-container">'+
'<div class="widget-heading">'+
'<h2 id="widget-zipcode-h2" style="font-style:normal !important;text-align:center;">Enter your zip code to<br />see plans in your area</h2></div>'+
'<input class="widget-userID" style="padding:5px !important" id="EnrollmentZipcode" name="data[enrollment][zipcode]"  placeholder="Zip Code*" value="Zip Code*" maxlength=10 type="text"  onfocus="if(this.value == ' + "'Zip Code*'" + '){ this.value = ' + "''" + '; }" onblur="if(this.value==' + "''" + '){ this.value=' + "'Zip Code*'" + '; }"/>'+
'<p class="widget-zipcode-reqfield">*required field</p>'+
'<input id="promocode" class="widget-password"  style="padding:5px !important"  name="data[Enrollment][promo_code]" readonly="readonly" type="text" value="Promo Code" />'+
'<p class="widget-zipcode-radioPara">This is service for a:</p>'+
'<div class="widget-checkBox-wrap widget-zipcode-radio1">'+
'<input id="widget-loginCheckbox" checked="checked" name="data[enrollment][typeofplan]" type="radio" value="Residential" />'+
			'<p class="widget-checkboxText">Home</p></div>'+
'<div class="widget-checkBox-wrap widget-zipcode-radio2">'+
'<input id="widget-loginCheckbox" name="data[enrollment][typeofplan]" type="radio" value="Commercial" />'+
			'<p class="widget-checkboxText">Business</p></div>'+
'<input id="widget-zipcode-enterBtn" type="submit" value="Enter" /></div></div></form>';
}
       
