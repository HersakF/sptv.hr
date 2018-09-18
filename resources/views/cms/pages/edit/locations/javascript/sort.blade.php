<script type="text/javascript">

    $('#sortableLocations').sortable({
        cursor: "move",
        stop: function(e, ui) {
            sortItems = $('#sortableLocations').sortable('toArray');
            $.ajax({
                type:'POST',
                url:'/cms/locations/sort-items',
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