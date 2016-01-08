<?php
if(get_field('wpdev_widget_layout', 'options') == 1) {
    echo '<div class="col-md-12">';
    dynamic_sidebar('footer-1');
    echo '</div>';
} elseif(get_field('wpdev_widget_layout', 'options') == 2) {
    echo '<div class="col-md-6">';
    dynamic_sidebar('footer-1');
    echo '</div>';
    echo '<div class="col-md-6">';
    dynamic_sidebar('footer-2');
    echo '</div>';
} elseif(get_field('wpdev_widget_layout', 'options') == 4) {
    echo '<div class="col-md-3">';
    dynamic_sidebar('footer-1');
    echo '</div>';
    echo '<div class="col-md-3">';
    dynamic_sidebar('footer-2');
    echo '</div>';
    echo '<div class="col-md-3">';
    dynamic_sidebar('footer-3');
    echo '</div>';
    echo '<div class="col-md-3">';
    dynamic_sidebar('footer-4');
    echo '</div>';
} else {
    echo '<div class="col-md-4">';
    dynamic_sidebar('footer-1');
    echo '</div>';
    echo '<div class="col-md-4">';
    dynamic_sidebar('footer-2');
    echo '</div>';
    echo '<div class="col-md-4">';
    dynamic_sidebar('footer-3');
    echo '</div>';
}
?>