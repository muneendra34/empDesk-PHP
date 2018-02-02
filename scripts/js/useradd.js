$(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullname: {
                validators: {
                    notEmpty: {
                        message: '* The full name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: '* The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: '* The email address is not valid'
                    }
                }
            },

            username: {
                validators: {
                    notEmpty: {
                        message: '* The user name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        message: '* The Username must be more than 2 and less than 15 characters long'
                    }
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: '* The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 8,
                        message: '* The password must be more than 3 and less than 8 characters long'
                    },
                    identical: {
                        field: 'repassword',
                        message: '* The password and its confirm password are not the same'
                    }
                }
            },
            repassword: {
                validators: {
                    notEmpty: {
                        message: '* The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 8,
                        message: '* The password must be more than 3 and  less than 8 characters long'
                    },
                    identical: {
                        field: 'password',
                        message: '* The confirm password is not matched'
                    }
                }
            }
            
          
        }
    });
});


$(document).ready(function(){
        $('.mess').hide();
        $('#click').click(function() {
            $('.mess').show();
        });
            
        });