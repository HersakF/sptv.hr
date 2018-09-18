<script type="text/javascript">

    $('#sortablePages').sortable({
        cursor: "move",
        stop: function(e, ui) {
            var sortItems = $('#sortablePages').sortable('toArray');
            var paginator = $('.paginator').data('paginator') - 1;
            $.ajax({
                type:'POST',
                url:'/cms/pages/sort-items',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "sortItems" : sortItems, "paginator": paginator },
                success:function () {
                    noty({text: 'Sortability completed.', layout: 'topRight', type: 'success', timeout: 2000});
                },
                error: function(){
                    noty({text: 'An error occurred.', layout: 'topRight', type: 'error', timeout: 2000});
                }
            });
        }
    });

</script>