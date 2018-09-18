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

    $(".set-visibility").on("change", function() {
        var id = $(this).attr('id');
        var visibility = $(this).val();

        $.ajax({
            type:'POST',
            url:'/cms/partners/set-visibility/'+id,
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