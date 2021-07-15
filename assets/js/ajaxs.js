// $(document).ready(function(){
// 	// event ketia di tulis
// 	$('#dpnim').on('keyup', function(){
// 		$('#jos').load('assets/ajax/setting_harga.php?keyword=' +  $('#dpnim').val());
// 	});
// });


$(document).ready(function(){
 $('#search').on('click', function(){
  var id= $('#dpnim').val();
  if(id != '')
  {
   $.ajax({
    url:"fetch_cari_dp.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
     
     $('#dpbayar').text(data.harga);
    }
   })
  }
  else
  {
   alert("Please Select Employee");
   $('#employee_details').css("display", "none");
  }
 });
});