<script>
    $(document).ready(function() {
        $('#pasien_id').keyup(function(){
            var query = $(this).val();
            if(query!=''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/rekam/mediscom')}}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(resultfromserver) {
                        $('#autocompleteresultlist').fadeIn(5);
                        $('#autocompleteresultlist').html(resultfromserver);
                    }
                })
            }
        })
    });
</script>