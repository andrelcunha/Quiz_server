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
});