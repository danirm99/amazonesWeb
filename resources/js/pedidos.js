    $(document).ready(function () {
    
        $(".anular").on("click", function ()  {

            var id =  $(this).attr("id") ;

                window.location.href = "anular/"+id + "";


        });

        $(".pdf").on("click", function ()  {

            var id =  $(this).attr("id") ;

            window.location.href = "print_pdf/"+id + "";

    });

});