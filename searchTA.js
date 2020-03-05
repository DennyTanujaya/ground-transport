$(document).ready(function(){
  $("#btn-search").click(function(){
    
    $.ajax({
      url: 'searchTA.php', // File tujuan
      type: 'POST', // Tentukan type nya POST atau GET
      data: {keyword: $("#keyword").val()}, // Set data yang akan dikirim
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#view").html(response.hasil);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText); // munculkan alert
      }
    });
  });
});