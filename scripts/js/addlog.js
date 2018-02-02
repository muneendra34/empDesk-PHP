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
           
                 mlogin: {
                validators: {
                    notEmpty: {
                        message: '* The Morning Login time is required and cannot be empty'
                    }
                
                }
            },

                    mlogout: {
                validators: {
                    notEmpty: {
                        message: '* The Afternoon Logout time is required and cannot be empty'
                    }
                
                }
            },


                    alogin: {
                validators: {
                    notEmpty: {
                        message: '* The Afternoon Login time is required and cannot be empty'
                    }
                
                }
            },
            
                 alogout: {
                validators: {
                    notEmpty: {
                        message: '* The Evening Logout time is required and cannot be empty'
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