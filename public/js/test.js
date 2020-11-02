$( document ).ready(function() {
    $(document).on("click",".referer-list input",function() {

        let $this = $(this);

        let id = $this.attr('data-id');

        if ($this.prop( "checked" )) {
            $.get( "/referals/" + id, function( data ) {
                $this.parent().append(data);
            });
        } else {
            $('.referer-list[data-referer='+id + ']').remove();
        }
    });
});
