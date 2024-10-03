$('#sendMail').on('click', function() {

        //check here
        var mail = $('#lmail').val();
        var name = $('#lname').val();
        var datavar = $('form').serialize();
        if (mail && name )
        {
            $.ajax({
                url : 'APImailer.php',
                type : 'POST',
                data : datavar,
                success : function(e) {
                    if (e.includes('invalid'))
                        console.log('empty field or mispelled mail');
                    else if (e.includes('error'))
                        console.log('error while sending mail, try later or this mailto:wajisanprod@gmail')
                    else
                        console.log('success');
                }
            });
            
        }
        else
            {
                alert("vous devez remplir les champs nom et mail");
            }
});