$(document).ready(function() {
    $("#tipopergsel input:radio").on('change', function() {
        if (this.id == "texto")
        {
            $("#divenuntexto").show();
            $("#divenunimagem").hide();
        }
        else
        {
            $("#divenunimagem").show();
            $("#divenuntexto").hide();
        }
    });

    $("#formpergunta").on("submit", function(event) {
        if (true)
        {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "exec/gravarPergunta.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#fupForm').css("opacity", ".5");
                },
                success: function(msg){
                    //$('.statusMsg').html('');
                    console.log(msg);
                    var result_msg = JSON.parse(msg);
                    if(result_msg.resposta == 200)
                    {
                        console.log(result_msg.pergcodigo);
                        $("#pergcodigo").val(result_msg.pergcodigo);
                    }
                  /*
                    if(msg == 'ok'){
                        $('#fupForm')[0].reset();
                        $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                    }else{
                        $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                    }
                  
                    */
                   $('#fupForm').css("opacity","");
                   $(".submitBtn").removeAttr("disabled");
                }
            });
        }
        event.preventDefault();

    });
});
