var page_number = 1;
var page_loading = false;
$(document).ready(function() {
        var owl = $("#owl-slider");
 
        owl.owlCarousel({
           
            itemsCustom : [
              [0, 1],
              [450, 1],
              [600, 1],
              [700, 2],
              [1000, 3],
              [1200, 4],
              [1400, 4],
              [1600, 4]
            ],
            navigation : false,
            pagination : false
       
        });

        $("#next").click(function(){
          owl.trigger('owl.next');
        });
        $("#prev").click(function(){
          owl.trigger('owl.prev');
        });

        $("#next_small").click(function(){
          owl.trigger('owl.next');
        });
        $("#prev_small").click(function(){
          owl.trigger('owl.prev');
        });

        page_number = 1;
        page_loading = false;
});

function js_visible_loading(visible) {
  if (visible == true) {
      $("#loading-bar").css("display", "block");
  }
  else {
      $("#loading-bar").css("display", "none");
  }
}

$(window).scroll(function() {
   if(page_loading == false && $(window).scrollTop() + $(window).height() > $(document).height() - 100) {
       page_loading = true;
       page_number++;
       js_visible_loading(true);
       $.get("refresh.php?page=" + page_number, function(response){
          $("#main-video-contents").append(response);
          page_loading = false;
          js_visible_loading(false);
       });
   }
});

/*
branch.banner(
// These are the customizations to the banner itself
{
    icon: 'http://icons.iconarchive.com/icons/wineass/ios7-redesign/512/Appstore-icon.png',
    title: 'Branch Demo App',
    description: 'The Branch demo app!',
    openAppButtonText: 'Open',              // Text to show on button if the user has the app installed
    downloadAppButtonText: 'Download',      // Text to show on button if the user does not have the app installed
    sendLinkText: 'Send Link',              // Text to show on desktop button to allow users to text themselves the app
    phonePreviewText: '+44 9999-9999',      // The default phone placeholder is a US format number, localize the placeholder number with a custom placeholder with this option
    showiOS: true,                          // Should the banner be shown on iOS devices?
    showAndroid: true,                      // Should the banner be shown on Android devices?
    showDesktop: true,                      // Should the banner be shown on desktop devices?
    iframe: true,                           // Show banner in an iframe, recomended to isolate Branch banner CSS
    disableHide: false,                     // Should the user have the ability to hide the banner? (show's X on left side)
    forgetHide: false,                      // Should we show the banner after the user closes it? Can be set to true, or an integer to show again after X days
    position: 'top',                        // Sets the position of the banner, options are: 'top' or 'bottom', and the default is 'top'
    mobileSticky: false,                    // Determines whether the mobile banner will be set `position: fixed;` (sticky) or `position: absolute;`, defaults to false *this property only applies when the banner position is 'top'
    desktopSticky: true,                    // Determines whether the desktop banner will be set `position: fixed;` (sticky) or `position: absolute;`, defaults to true *this property only applies when the banner position is 'top'
    customCSS: '.title { color: #F00; }',   // Add your own custom styles to the banner that load last, and are gauranteed to take precedence, even if you leave the banner in an iframe
    make_new_link: false,                   // Should the banner create a new link, even if a link already exists?
    rating: 5,                              // Number of stars (should be your store rating)
    reviewCount: 1000,                      // Number of reviews that generate the rating (should be your store reviews)
    theme: 'light'                         // Uses Branch's predetermined color scheme for the banner { 'light' || 'dark' }, default: 'light'
    // buttonBackgroundColor: css color,        // Overrides the theme's default colors
    // buttonFontColor: css color,
    // buttonBorderColorHover: css color,
    // buttonBackgroundColorHover: css color,
    // buttonFontColorHover: css color
},

// Here is where you define the deep link that you'd like to use
{ 
    tags: ['version12', 'trial-b'],
    feature: 'smart_banner',
    stage: 'shoe_page',
    data: {
        '$deeplink_path': 'content/page/12354',
        deeplink: 'data',
        username: 'Alex'
    }
});*/