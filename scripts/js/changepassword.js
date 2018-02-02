$(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
                password1: {
                validators: {
                    notEmpty: {
                        message: '* The user name is required and cannot be empty'
                    }
                }
            },
            password2: {
                validators: {
                    notEmpty: {
                        message: '* The user name is required and cannot be empty'
                    }
                },
                identical: {
                        field: 'password3',
                        message: '* The password and its confirm password are not the same'
                    }
            },
            password3: {
                validators: {
                    notEmpty: {
                        message: '* The user name is required and cannot be empty'
                    }
                },
                identical: {
                        field: 'password2',
                        message: '* The confirm password is not matched'
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
        
        $(document).ready(function(){
        
        $('#click').click(function() {
            $('.mess2').show();
        });
            
        });