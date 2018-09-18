<script type="text/javascript">

    $('#sortableVideos').sortable({
        cursor: "move",
        stop: function(e, ui) {
            sortItems = $('#sortableVideos').sortable('toArray');
            $.ajax({
                type:'POST',
                url:'/cms/videos/sort-items',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "sortItems" : sortItems},
                success:function () {
                    noty({text: 'Sorting completed.', layout: 'topRight', type: 'success', timeout: 2000});
                },
                error: function(){
                    noty({text: 'An error occurred while trying to sort items.', layout: 'topRight', type: 'error', timeout: 2000});
                }
            });
        }
    });

</script>