<script>
    @if($message = Session::get('success'))
        jQuery(function(){
            Dashmix.helpers('notify', {
                type: 'success', icon: 'fa fa-check mr-1',
                message: @json($message)
            });
        });
    @endif
    @if($message = Session::get('error'))
        jQuery(function(){
            Dashmix.helpers('notify', {
                type: 'danger', icon: 'fa fa-times mr-1',
                message: @json($message)
            });
        });
    @endif
</script>
