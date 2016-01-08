jQuery(function($) {
    $(document).ready(new function() {
        $('li.aggregation_rss_item').wookmark({
            align: 'left',
            autoResize: true, // This will auto-update the layout when the browser window is resized.
            container: $('.container.aggregation-site-content'), // Optional, used for some extra CSS styling
            offset: 0, // Optional, the distance between grid items
            itemWidth: 336 // Optional, the width of a grid item
        });
    });
});