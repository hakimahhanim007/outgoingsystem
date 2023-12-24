function selectBrand()
{
  var x = document.getElementById("mobile").value;

  $.ajax({

      url :"showreport.php",
      method : "POST",
      data:{
        id : x
    },
    success:function(data){
    $("#ans").html(data);
  }

})
}

