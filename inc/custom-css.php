<?php 

$maincolor = get_field('wpdev_main_color', 'options');
$secondcolor = get_field('wpdev_secondary_color', 'options');


/**********
    SITE COLORS
**********/

$readmorecolor = 'a.post_item_readmore, input#submit, button, input[type="button"], input[type="reset"], input[type="submit"] { background: ' . $secondcolor . '; }';
$hyperlinkcolor = '#content a, #content a:visited { color: ' . $maincolor . '; }';

$sitecolorfinal = $readmorecolor . $hyperlinkcolor;


/**********
    LAYOUT SETTINGS
**********/

$layout = get_field('wpdev_layout', 'options'); // Site Layout - Boxed/Fullwidth
$menubg = get_field('wpdev_main_menu_color', 'options'); // Header BG Color
$footerbg = get_field('wpdev_background_color', 'options'); // Footer BG Color

if($layout == 1) { // Fixed Layout
    $menubgfinal = '.container-fluid.aggregation-topbar-cont, .container-fluid.aggregation-menu-cont { background: ' . $menubg . '; } ul.sub-menu { background: ' . $menubg . '; }';
    $footerbgfinal = '.container-fluid.aggregation-footer-cont { background: ' . $footerbg . '; }';
} else { // Boxed Layout
    $menubgfinal = '.container.aggregation-topbar, .container.aggregation-menu { background: ' . $menubg . '; } ul.sub-menu { background: ' . $menubg . '; }';
    $footerbgfinal = '.container.aggregation-footer { background: ' . $footerbg . '; }';
    
    $boxedtype = get_field('wpdev_boxed_background', 'options');
    
    if($boxedtype == 0) { // Color BG
        $boxedbg = get_field('wpdev_boxed_background_color', 'options');
        $boxedbgfinal = 'body { background: ' . $boxedbg . '; } .container { background: #fff; }';
    } else { // Image BG
        $boxedbg = get_field('wpdev_boxed_background_image', 'options');
        $boxedbgrpt = get_field('wpdev_boxed_background_repeat', 'options');
        if($boxedbgrpt == 1) {
            $boxbgrptfinal = 'background-repeat: repeat;';
        } else {
            $boxbgrptfinal = 'background-repeat: no-repeat;';
        }
        $boxedbgfinal = 'body { background: url("' . $boxedbg . '"); ' . $boxbgrptfinal . ' background-size: contain; } .container { background: #fff; }';
    }

}


/**********
    TYPOGRAPHY
**********/

    
    // Heading Styles
    $headfont = get_field('wpdev_heading_font', 'options');
    $headfontfix = str_replace(array('+'), ' ' , $headfont);
    $headweight = get_field('wpdev_heading_bold', 'options');
    $headitalic = get_field('wpdev_heading_italic', 'options');
    $headunderline = get_field('wpdev_heading_underline', 'options');
    $headbox = get_field('wpdev_heading_colored_box', 'options');
    $headuppercase = get_field('wpdev_heading_uppercase', 'options');

    if($headfont) {
        $headingfont = 'font-family: "' . $headfontfix . '";';
    } else {
        $headingfont = 'font-family: "Lato"';
    }
    if($headweight[0] == 1) {
        $headingweight = 'font-weight: 700;';
    } else {
        $headingweight = 'font-weight: 400;';
    }
    if($headitalic[0] == 1) {
        $headingitalic = 'font-style: italic;';
    } else {
        $headingitalic = 'font-style: normal;';
    }
    if($headunderline[0] == 1) {
        $headingunderline = 'text-decoration: underline;';
    } else {
        $headingunderline = 'text-decoration: none;';
    }
    if($headbox[0] == 1) {
        $headingbox = 'background: ' . $maincolor . '; color: #fff !important; padding: 1rem;';
    } else {
        $headingbox = 'background: none; color: ' . $maincolor . ';';
    }
    if($headuppercase[0] == 1) {
        $headinguppercase = 'text-transform: uppercase;';
    } else {
        $headinguppercase = 'text-transform: none;';
    }

    $headingstylefinal = 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, a h1, a h2, a h3, a h4, a h5, a h6 { ' . $headingfont . $headingweight . $headingitalic . $headingunderline . $headingbox . $headinguppercase . ' }';

    // Aggregation Heading Styles
    $aggregationheadfont = get_field('wpdev_aggregation_heading_font', 'options');
    $aggregationheadfontsize = get_field('wpdev_aggregation_heading_font_size', 'options');
    $aggregationheadfontcolor = get_field('wpdev_aggregation_head_font_color', 'options');
    $aggregationheadlineheight = get_field('wpdev_aggregation_heading_line_height', 'options');
    $aggregationheadfontfix = str_replace(array('+'), ' ' , $aggregationheadfont);
    $aggregationsideborders = get_field('wpdev_aggregation_heading_side_borders', 'options');
    $aggregationsideborderscolor = get_field('wpdev_aggregation_heading_side_borders_color', 'options');
    $aggregationheadweight = get_field('wpdev_aggregation_heading_bold', 'options');
    $aggregationheaditalic = get_field('wpdev_aggregation_heading_italic', 'options');
    $aggregationheadunderline = get_field('wpdev_aggregation_heading_underline', 'options');
    $aggregationheadbox = get_field('wpdev_aggregation_heading_colored_box', 'options');
    $aggregationheaduppercase = get_field('wpdev_aggregation_heading_uppercase', 'options');

    if($aggregationheadfont) {
        $aggregationheadingfont = 'font-family: "' . $aggregationheadfontfix . '";';
    } else {
        $aggregationheadingfont = 'font-family: "Lato"';
    }
    if($aggregationheadfontsize) {
        $aggregationheadingfontsize = 'font-size: ' . $aggregationheadfontsize . 'px;';
    } else {
        $aggregationheadingfontsize = 'font-size: 1.4rem';
    }
    if($aggregationheadfontcolor) {
        $aggregationheadfontcolors = 'color: ' . $aggregationheadfontcolor . ' !important;';
    } else {
        $aggregationheadfontcolors = 'color: ' . $maincolor . ' !important;';
    }
    if($aggregationsideborders[0] == 1) {
        if($aggregationsideborderscolor) {
            $sidebordercolor = $aggregationsideborderscolor;
        } else {
            $sidebordercolor = '#E7E7E7';
        }
        $aggregationheadingsideborders = 'box-shadow: 9px 0px 0px #FFFFFF, 10px 0px 0px ' . $sidebordercolor . ', -10px 0px 0px #FFFFFF, -11px 0px 0px ' . $sidebordercolor . ';';
    } else {
        $aggregationheadingsideborders = '';
    }
    if($aggregationheadlineheight) {
        $aggregationheadinglineheight = 'line-height: ' . $aggregationheadlineheight . 'px;';
    } else {
        $aggregationheadinglineheight = 'line-height: 1.8rem;';
    }
    if($aggregationheadweight[0] == 1) {
        $aggregationheadingweight = 'font-weight: 700;';
    } else {
        $aggregationheadingweight = 'font-weight: 400;';
    }
    if($aggregationheaditalic[0] == 1) {
        $aggregationheadingitalic = 'font-style: italic;';
    } else {
        $aggregationheadingitalic = 'font-style: normal;';
    }
    if($aggregationheadunderline[0] == 1) {
        $aggregationheadingunderline = 'text-decoration: underline;';
    } else {
        $aggregationheadingunderline = 'text-decoration: none;';
    }
    if($aggregationheadbox[0] == 1) {
        $aggregationheadingbox = 'background: ' . $maincolor . '; color: #fff !important; padding: 1rem;';
    } else {
        $aggregationheadingbox = 'background: none; color: ' . $maincolor . ';';
    }
    if($aggregationheaduppercase[0] == 1) {
        $aggregationheadinguppercase = 'text-transform: uppercase;';
    } else {
        $aggregationheadinguppercase = 'text-transform: none;';
    }

    $aggregationheadingstylefinal = 'a.post_item_title h1 { ' . $aggregationheadingfont . $aggregationheadfontcolors . $aggregationheadingfontsize . $aggregationheadinglineheight . $aggregationheadingweight . $aggregationheadingitalic . $aggregationheadingunderline . $aggregationheadingbox . $aggregationheadinguppercase . ' } .post_item_item { ' . $aggregationheadingsideborders . ' }';


    // Body Styles
    $bodyfonts = get_field('wpdev_body_font', 'options');
    $bodyfontsfix = str_replace(array('+'), ' ' , $bodyfonts);
    $bodysizes = get_field('wpdev_body_font_size', 'options');
    $bodycolors = get_field('wpdev_body_font_color', 'options');

    if($bodyfonts) {
        $bodyfont = 'font-family: "' . $bodyfontsfix . '";';
    } else {
        $bodyfont = 'font-family: "Lato";';
    }
    if($bodysizes) {
        $bodysize = 'font-size: ' . $bodysizes . 'px;';
    } else {
        $bodysize = 'font-size: 1rem;';
    }
    if($bodycolors) {
        $bodycolor = 'color: ' . $bodycolors . ';';
    } else {
        $bodycolor = 'color: #000;';
    }

    $bodystylefinal = 'body { ' . $bodyfont . $bodysize . $bodycolor . ' }';


    // Menu Styles
    $menufonts = get_field('wpdev_menu_font', 'options');
    $menufontsfix = str_replace(array('+'), ' ' , $menufonts);
    $menusizes = get_field('wpdev_menu_font_size', 'options');
    $menucolors = get_field('wpdev_menu_font_color', 'options');
    $menubolds = get_field('wpdev_menu_bold', 'options');
    $menuuppercases = get_field('wpdev_menu_uppercase', 'options');

    if($menufonts) {
        $menufont = 'font-family: "' . $menufontsfix . '";';
    } else {
        $menufont = 'font-family: "Lato";';
    }
    if($menusizes) {
        $menusize = 'font-size: ' . $menusizes .'px;';
    } else {
        $menusize = 'font-size: 1rem;';
    }
    if($menucolors) {
        $menucolor = 'color: ' . $menucolors . ';';
    } else {
        $menucolor = 'color: ' . $maincolor . ';';
    }
    if($menubolds[0] == 1) {
        $menubold = 'font-weight: 700;';
    } else {
        $menubold = 'font-weight: 400;';
    }
    if($menuuppercases[0] == 1) {
        $menuuppercase = 'text-transform: uppercase;';
    } else {
        $menuuppercase = 'text-transform: normal;';
    }

    $menustylefinal = 'ul#main-menu li a { ' . $menufont . $menusize . $menucolor . $menubold . $menuuppercase . ' } ul#top-menu li a, ul#top-menu-user li a { ' . $menufont . $menucolor . $menubold . $menuuppercase . ' } ul#top-menu-user li.wpdev-profile a { color: ' . $maincolor . ' !important; }';



/**********
    FOOTER
**********/

$footercolor = get_field('wpdev_footer_font_color', 'options');
$footerlink = get_field('wpdev_footer_link_color', 'options');
$footeroutput = 'footer { color: ' . $footercolor . '; } footer .site-info a { color: ' . $footerlink . ' !important; }';



?>


<style type="text/css">
    <?php 
        echo $menubgfinal; 
        echo $boxedbgfinal;
        echo $footerbgfinal;
        echo $footeroutput;
        echo $headingstylefinal;
        echo $aggregationheadingstylefinal;
        echo $bodystylefinal;
        echo $menustylefinal;
        echo $sitecolorfinal;
    ?>
</style>