 $(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
                username: {
                validators: {
                    notEmpty: {
                        message: '* The user name is required and cannot be empty'
                    }
                }
            },
                
            date: {
                validators: {
                    notEmpty: {
                        message: '* The full name is required and cannot be empty'
                    }
                }
            },
           
                 login: {
                validators: {
                    notEmpty: {
                        message: '* The email address is required and cannot be empty'
                    }
                
                }
            },
            
                 logout: {
                validators: {
                    notEmpty: {
                        message: '* The email address is required and cannot be empty'
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