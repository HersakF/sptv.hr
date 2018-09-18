<script type="text/javascript">

    $(".set-files-visibility").on("change", function() {
        var id = $(this).attr('id');
        var visibility = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/files/set-visibility/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "visibility" : visibility, "id" : id },
            success:function () {
                noty({text: 'Uredili ste vidljivost datoteke.', layout: 'topRight', type: 'success', timeout: 2000});
            },
            error: function(){
                noty({text: 'Došlo je do pogreške.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>