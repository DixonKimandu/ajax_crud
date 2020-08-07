$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';

        var office = get_filter('office');
        var country = get_filter('country');
        var counselor = get_filter('counselor');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, office:office, country:country, counselor:counselor},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

});
