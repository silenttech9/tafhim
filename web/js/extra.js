$(function(){

    $('.lookupCreate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('.lookupUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('.lookupView').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });


    $(".generated").click(function(){
        $(".tlhjana").show(1000);
        $(".blmjana").hide(1000);
    });
    $(".notgenerated").click(function(){
        $(".blmjana").show(1000);
        $(".tlhjana").hide(1000);
    });
    $(".showall").click(function(){
        $(".tlhjana").show(1000);
        $(".blmjana").show(1000);
    });

    $(".date-picker").datepicker(); //date

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".inputFile").change(function () {
        readURL(this);
        $('#cancel').show();
    });
    $('#cancel').click(function(e)
   {
       $('.inputFile').val("");
       $('#image_upload_preview').attr("src","http://localhost/tahfiz/web/image/no-image.png?>");
       $('#cancel').hide();
       
   });

    $('#proses_gaji_cariannama').keypress(function (e) {
      if (e.which == 13) {
        $('form#proses_gaji').submit();
        return false;    //<---- Add this line
      }
    });

    $('#proses_gaji_cariannokp').keypress(function (e) {
      if (e.which == 13) {
        $('form#proses_gajinokp').submit();
        return false;    //<---- Add this line
      }
    });
    
    $('#proses_gaji_cariannopekerja').keypress(function (e) {
      if (e.which == 13) {
        $('form#proses_gaji').submit();
        return false;    //<---- Add this line
      }
    });

    // yuran daftar
    $('#jumlahbayaran').keyup(calculate);
    
    function calculate(e) {
        var maths =$('#yuran').val() - $('#jumlahbayaran').val();
        $('#sum').val(maths);
    }

    $('.open-modal').click(function () {
         var idtahfiz = $(this).data('id');
         var name = $(this).data('name');
         console.log(name);
         $(".modal-body #tahfizId").val( idtahfiz );
         $("h4#tahfizname").text( name );
    });

    // $('.lookupCreate').click(function(){
    //     $('#modal').modal('show')
    //     .find('#modalContent')
    //     .load($(this).attr('value'));

    // });

    

})