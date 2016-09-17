  $(function(){
  	$("#tgl_hari").datepicker({ format:'yyyy-mm-dd', changeMonth:true, changeYear:true, autoclose:true });
  	$("#tgl").datepicker({ format:'yyyy-mm', changeMonth:true, changeYear:true, autoclose:true });
  	$("#tgl_bulan").datepicker({ format:'yyyy-mm', changeMonth:true, changeYear:true, autoclose:true });
  	$("#tgl_tahun").datepicker({ format:'yyyy', changeMonth:false, changeYear:true, autoclose:true });
  });