<script type="text/javascript">

    $(".files").fileinput({
        previewSettings: {
            image: { width: "160px", height: "auto" },
            html: { width: "160px", height: "auto" },
            other: { width: "160px", height: "auto" }
        },
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-success btn-block",
        fileType: "any"
    });

    $(".set-carousels-visibility").on("click", function() {
        var id = $(this).attr('id');
        var visibility = $(this).val();

        if(visibility == 0){
            visibility = 1;
        }else{
            visibility = 0;
        }

        $.ajax({
            type:'POST',
            url:'/cms/carousels/set-visibility/'+id,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "visibility" : visibility, "id" : id },
            success:function () {
                if(visibility == 1){
                    $('button.set-carousels-visibility').html('<i class="fa fa-eye"></i> Shown');
                    $('button.set-carousels-visibility').val(1);
                }else{
                    $('button.set-carousels-visibility').html('<i class="fa fa-eye-slash"></i> Hidden');
                    $('button.set-carousels-visibility').val(0);
                }
                noty({text: 'Visibility updated.', layout: 'topRight', type: 'success', timeout: 2000});
            },
            error: function(){
                noty({text: 'An error occurred while trying set item visibility.', layout: 'topRight', type: 'error', timeout: 2000});
            }
        });
    });

    $(".set-carousels-fragments-visibility").on("change", function() {
        var id = $(this).attr('id');
        var visibility = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/carousels-fragments/set-visibility/'+id,
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