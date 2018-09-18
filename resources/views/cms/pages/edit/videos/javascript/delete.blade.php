<script type="text/javascript">

    $(".deleteVideosItem").on("click", function() {
        var id = $(this).attr('id');
        $("#deleteItemForm").attr('action', '/cms/videos/'+id);
        $('#deleteItemForm').append("<input type='hidden' name='_method' value='DELETE'/>");
    });

</script>