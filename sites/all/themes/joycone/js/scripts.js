$(function() {
    var hashSeg = window.location.hash.substring(1).split("/");

    $(".accordion").each(function() {
        var accordion = $(this);
        var singleOpen = accordion.attr("data-ac-single-open");
        var acLevel = accordion.parents(".accordion").length;

        var blocks = accordion.find(".ac_block").filter(function() {
            return accordion[0] == $(this).closest(".accordion")[0];
        });

        accordion.data("ac_blocks", blocks);

        accordion.bind("ac_open", function(event, blockName, closeAll) {
            event.stopPropagation();

            if (blockName != null) {
                var openBlocks = blocks.filter(function() { return $(this).attr("data-ac-block-name") == blockName; });
                if (closeAll && openBlocks.length != 0) $(this).trigger("ac_close");
                openBlocks.trigger("ac_open");
            } else {
                blocks.trigger("ac_open");
            }
        });
        accordion.bind("ac_close", function(event, blockName) {
            event.stopPropagation();

            if (blockName == null) blocks.trigger("ac_close");
            else blocks.filter(function() { return $(this).attr("data-ac-block-name") == blockName; }).trigger("ac_close");
        });

        blocks.each(function() {
            var block = $(this);
            var handle = block.find(".ac_handle").filter(function() {
                return block[0] == $(this).closest(".ac_block")[0];
            });
            var content = block.find(".ac_content").filter(function() {
                return block[0] == $(this).closest(".ac_block")[0];
            });

            block.data("ac_accordion", accordion);
            block.data("ac_handle", handle);
            block.data("ac_content", content);

            block.bind("ac_open", function(event) {
                event.stopPropagation();

                if (block.hasClass("ac_open")) return;

                block.trigger("ac_opening", [ block, handle, content ]);

                if (singleOpen) accordion.trigger("ac_close");
                block.addClass("ac_open ac_opening").trigger("ac_opening", [ block, handle, content ]);;
                content.slideDown({
                    step: function() {
                        block.trigger("ac_opening_step", [ block, handle, content ]);
                    },
                    complete: function() {
                        block.removeClass("ac_opening").trigger("ac_opened", [ block, handle, content ]);
                    }
                });
                accordion.addClass("ac_open");
            });
            block.bind("ac_close", function(event) {
                event.stopPropagation();

                if (!block.hasClass("ac_open")) return;

                block.removeClass("ac_open").addClass("ac_closing").trigger("ac_closing", [ block, handle, content ]);
                content.slideUp({
                    step: function() {
                        block.trigger("ac_closing_step", [ block, handle, content ]);
                    },
                    complete: function() {
                        block.removeClass("ac_closing").trigger("ac_closed", [ block, handle, content ]);
                    }
                });
                if (blocks.filter(".ac_open").length == 0) accordion.removeClass("ac_open");
            });
            block.bind("ac_toggle", function(event) {
                event.stopPropagation();

                if (block.hasClass("ac_open")) {
                    block.trigger("ac_close");
                } else {
                    block.trigger("ac_open");
                }
            });

            handle.click(function() {
                block.trigger("ac_toggle");
            });

            if (block.hasClass("ac_open")) content.show();
            else content.slideUp(0);
        });

        if (hashSeg[acLevel] != null && hashSeg[acLevel] != "") {
            accordion.trigger("ac_open", [ hashSeg[acLevel], true ]);
        }
    });

    var $body = $(document.body);
    if ($body.is(".front")) {
        jq191("#jump_slider .slider_root").bxSlider({
            auto: true,
            autoControls: false,
            autoHover: true,
            pager: false,
            speed: 1000,
            nextText: "",
            prevText: ""
        });
        jq191("#waffle_slider .slider_root").bxSlider({
            auto: false,
            autoControls: false,
            pager: false,
            speed: 1000,
            nextText: "",
            prevText: ""
        });
    } else if ($body.is(".page-promotions")) {
        var imagesToLoad = $(".promo-block.width-large img, .promo-block.width-small img").length;
        $(".promo-block.width-large img, .promo-block.width-small img").bind("load", function() {
            imagesToLoad--;
            if (imagesToLoad != 0) return;

            var height = 0;
            $(".promo-block.width-large, .promo-block.width-small").each(function() {
                if ($(this).outerHeight() > height) height = $(this).outerHeight();
            }).height(height);
        });
    } else if ($body.is(".page-kids")) {
        jq191("#node-kids-images-slider .slider_root > div").bxSlider({
            auto: false,
            autoControls: false,
            pager: false,
            speed: 1000,
            nextText: "",
            prevText: "",
            minSlides: 4,
            maxSlides: 4,
            moveSlides: 4,
            slideMargin: 0,
            slideWidth: 189
        });

        jq191("#color_win_image .slider_root").bxSlider({
            auto: true,
            autoControls: false,
            autoHover: true,
            controls: false,
            pager: false,
            speed: 1000
        });
    } else if ($body.is(".page-products")) {
        $(".node-product.ac_block").each(function() {
            var top = $(this).offset().top;
            var $w = $(window);
            var rowBlocks = $(".ac_block").filter(function() { return $(this).offset().top == top; });
            var rowSpacers = rowBlocks.children(".ac_spacer");

            var getMaxRowContentHeight = function() {
                var height = 0;
                rowBlocks.filter(".ac_open, .ac_opening, .ac_closing").each(function() {
                    var content = $(this).data("ac_content");
                    if (content.is(":visible") && content.outerHeight() > height) height = content.outerHeight();
                });
                return height;
            };

            $(this).bind("ac_opening_step", function(event, block, handle, content) {
                rowSpacers.height(getMaxRowContentHeight());
                $w.scrollTop(Math.max($w.scrollTop(), block.offset().top + block.outerHeight() - $w.height()));
                $w.scrollTop(Math.min($w.scrollTop(), block.offset().top));
            }).bind("ac_closing_step", function(event, block, handle, content) {
                rowSpacers.height(getMaxRowContentHeight());
            }).bind("ac_opening", function(event, block, handle, content) {
                if (rowBlocks.filter(".ac_closing").length === 0) rowSpacers.height(0).show();
                content.css("z-index", 6);
            }).bind("ac_closing", function(event, block, handle, content) {
                content.css("z-index", 4);
            }).bind("ac_opened", function(event, block, handle, content) {
                content.css("z-index", "");
                window.location.hash = block.attr("id").match(/^node-(\d+)$/)[1];
            }).bind("ac_closed", function(event, block, handle, content) {
                if (rowBlocks.filter(".ac_open").length === 0) rowSpacers.hide();
                if (!block.data("ac_accordion").hasClass("ac_open")) {
                    var top = $w.scrollTop();
                    window.location.hash = "";
                    $w.scrollTop(top);
                }
                content.css("z-index", "");
                content.children('.r_img').removeClass('pkg_img');
            });
        });

        $(window).hashchange(function() {
            var hash = window.location.hash.substring(1);
            if (hash == "" || $("#node-" + hash).length == 0) {
                $("#taxonomy-term-1.accordion").trigger("ac_close");
            } else if ($(".node-product.ac_open").attr("id") != "node-" + hash) {
                $("#node-" + hash).trigger("ac_open");
            }
        });
        $(window).hashchange();
    } else if ($body.is(".page-food-service-products")) {
        $(".__sibling_atb").click(function(event) {
            event.stopPropagation();
            event.preventDefault();

            $(this).siblings('.add-to-cart').children('form').submit();
        });
    } else if ($body.is(".page-cart-end")) {
        $("#cart-form-buttons").clone().insertBefore("#cart-form-products");
    } else if ($body.is(".page-recipes")) {
        $("#content iframe").bind("load", function() {
            $("#content iframe")[0].contentDocument.body.style.overflow = "visible";
            $($("#content iframe")[0].contentDocument.body).find("#navheader .username a").attr("href", "http://www.pinterest.com/joycone/recipe-ideas").attr("target", "_blank");
        });
    }

    if ($body.is(".page-products") || $body.is(".page-node.node-type-product")) {
        $(".node-product.ac_block .copy_container h3:last-child").remove();
    }

	$("span#promo_dropdown_handle").click(function() {
        $("#promo_header .promo_content").slideToggle("slow");
        $(this).toggleClass("open");
	});

    $('[data-nutrition]').click(function(e) {
        e.preventDefault();

        var modal = $('#nutrition-modal');

        $('.nutrition-modal-background').show();
        modal.show();
        modal.find('.nutrition-modal-image').attr('src', $(this).attr('data-nutrition'));

        $('.nutrition-modal-close').click(function() {
            modal.hide();
            $('.nutrition-modal-background').hide();
            $(this).unbind('click');
        });

    });

    $("#follow_us_link").attr("href", $("#social_list .facebook a").attr("href"));
    $("#promo_dropdown_handle").html($("#promo_header .block").attr("data-title"));
		
		// facility tour info link
		$("#node-32354 a").click(function(e){
			e.preventDefault();
			$("#faq_body").trigger('ac_open', ['tours']);
			$("html, body").animate({ scrollTop: $(".ac_block[data-ac-block-name=tours]").offset().top - 25 }, 125, function(){
				window.location.hash = 'tours';
			});
		});
});
