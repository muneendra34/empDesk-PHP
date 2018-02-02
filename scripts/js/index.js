 $(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
    date:{
        validators:{
            notEmpty:{
                message: '* The date is required and connot be empty'
            }
        }
    },
    login: {
                validators: {
                    notEmpty: {
                        message: '* The login time is required and cannot be empty'
                    }
                }
            },
    logout: {
                validators: {
                    notEmpty: {
                        message: '* The logout time is required and cannot be empty'
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