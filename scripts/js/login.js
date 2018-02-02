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
                        message: ' * The user name is required and cannot be empty'
                        
                    }
                }
            },
    password: {
                validators: {
                    notEmpty: {
                        message: ' * The password is required and cannot be empty'
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
        
  $(document).ready(function(){
        $('#click').click(function() {
            $('.mess2').show();
        });  
        });