<script type="text/javascript">

    $(".set-locations-visibility").on("change", function() {
        var id = $(this).attr('id');
        var visibility = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/locations/set-visibility/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "visibility" : visibility, "id" : id },
            success:function () {
                noty({text: 'Visibility updated.', layout: 'topRight', type: 'success', timeout: 2000});
            },
            error: function(){
                noty({text: 'An error occurred while trying set item visibility.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

</script>