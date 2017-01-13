$(document).ready(function() {
    var socialmedia = new SocialMedia();
    socialmedia.get_instagram();
    socialmedia.get_twitter();
});

/**
 * Extend String class to include replaceAll. 
 *
 * Replace all instances that match the given regex
 */
String.prototype.replaceAll = function(search, replacement) {
    var self = this;
    return self.replace(new RegExp(search), replacement);
};

/**
 * Instagram class: 
 *
 * Only run on page when instagram elements exist.
 *
 * Fetches data from instagram API and displays them in html list elements. 
 */
class SocialMedia {
    constructor() {
        var self = this;
        if ($('.socialmedia').length <= 0 ) {
            return false;
        }
    }

    get_instagram() {
        $.ajax({
            url: ASSETS["ajaxurl"],
            data: {
                'action': 'get_instagram'
            },
            success: function(res) {
                // append each instagram post to ul
                
                var instagrams = JSON.parse(res);
                $.each(instagrams.data, function() {
                    var instagram = $(this)[0];

                    // regex instagram         
                    var hash_regex = instagram.caption.text.replaceAll(/(?:@)([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)/g, "<span>@$1</span>");
                    var at_regex = hash_regex.replaceAll(/(?:#)([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)/g, "<span>#$1</span>");
                    var caption = (at_regex.length > 200 ? at_regex.substr(0, 200) + '...' : at_regex);

                    var img = '<img src="' + instagram.images.standard_resolution.url + '" />';
                    var text_overlay = '<div class="text-overlay"><p>' + caption + '</p><span></div>';
                    var a = '<a href="http://www.instagram.com/signaturecommunities" target="_blank">' + img + '</a>';
                    var li = '<li>' + a + '</li>';
                    $('.socialmedia__instagramlist').append(li);
                });
            }
        });
    }

    get_twitter() {
        $.ajax({
            url: ASSETS["ajaxurl"],
            data: {
                'action': 'get_twitter'
            },
            success: function(res) {
                var tweets = JSON.parse(res);
                $.each(tweets, function() {
                    var text = this.text;
                    var urlPattern = /(https?:\/\/[\w-]+\.[\w-]+[\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-]?)/;
                    var reg_text = text.replaceAll(urlPattern, "<a href='$1' target='_blank'>$1</a>");                    
                    var li = "<li><p>" + reg_text + "</p></li>";
                    $('.socialmedia__twitterlist').append(li);
                }); 
            }
        });
    }
}