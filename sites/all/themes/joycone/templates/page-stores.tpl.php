<?php include 'page__header.tpl.php';
$products = joycone_all_products_az();
if (!empty($_REQUEST['zip'])) {
    $_REQUEST['zip'] = str_pad(intval($_REQUEST['zip']), 5, '0', STR_PAD_LEFT);
    
    $zip_coords = joycone_get_zip_coords($_REQUEST['zip']);
    $stores = joycone_get_stores_by_zip($_REQUEST['zip'], $_REQUEST['r'], $_REQUEST['pid']);
}
?>
<div id="locator">
<form class="rfloat nowrap" id="locator_args">
    <input type="hidden" id="locator_product_id" value="" />
    <input type="text" id="locator_zip" value="<?php echo $_REQUEST['zip']; ?>" placeholder="Enter ZIP Code" />
    <select id="locator_radius" onchange="$(this).closest('form').submit();">
        <option value="10" <?php if ($_REQUEST['r'] == '10') { echo 'selected="selected"'; } ?>>10 mi</option>
        <option value="15" <?php if ($_REQUEST['r'] == '15') { echo 'selected="selected"'; } ?>>15 mi</option>
        <option value="30" <?php if ($_REQUEST['r'] == '30') { echo 'selected="selected"'; } ?>>30 mi</option>
    </select>
    <button type="submit" class="button-blue">Find Joy &#9654;</button>
</form>

<?php echo $content; ?>

<div id="locator_products" class="lfloat">
    <ul><li><label><input type="radio" name="product_id" value="any" <?php echo empty($_REQUEST['pid']) ? 'checked="checked"' : ''; ?> /> Any Product</label></li></ul>

    <h3 class="rw_ultra_bold">Choose Product</h3>
    
    <ul id="locate_products">
        <?php foreach ($products as $p) { ?>
            <li>
                <label>
                    <input type="radio" name="product_id" value="<?php echo $p->nid; ?>" <?php echo $p->nid == $_REQUEST['pid'] ? 'checked="checked"' : ''; ?> />
                    <span><?php echo $p->title; ?></span>
                </label>
            </li>
        <?php }?>
    </ul>
</div>
<div id="locator_body">
    <h3 class="rw_ultra_bold">Results</h3>

    <div id="locator_tabs" class="tright" <?php if (empty($stores)) { echo 'style="display:none;"'; } ?>>
        <a id="locator_results_list_tab" href="javascript:void(0)" class="locate_view rw_bold" onclick="showListTab();">List View</a>
        <a id="locator_results_map_tab" href="javascript:void(0)" class="active locate_map rw_bold" onclick="showMapTab();">Map View</a>
    </div>

    <div id="locator_results">
        <div id="locator_loader" <?php if (empty($_REQUEST['zip']) || empty($stores)) { echo 'style="display:none;"'; } ?>>
            <img src="/sites/all/themes/joycone/images/loading_icon.gif" />
            <br />
            Hang on a Sec!
        </div>

        <div id="locator_results_nozip" <?php if (!empty($_REQUEST['zip'])) { echo 'style="display:none;"'; } ?>>
            <h3 class="rw_ultra_bold red">Please enter your zip code to search for stores!</h3>
        </div>

        <div id="locator_results_empty" <?php if (!empty($stores)) { echo 'style="display:none;"'; } ?>>
            <h3 class="rw_ultra_bold red">No stores found given your search criteria!</h3>
        </div>

        <div id="locator_results_map">
            <div id="map"></div>
        </div>

        <div id="locator_results_list">
            <?php
						if ($stores) {
							foreach ($stores as $idx => $store) {
									$store->field_name[0]['value'] = ($idx+1).'. '.$store->field_name[0]['value'];
									echo node_view($store, 1);
							}
						}
            ?>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/sites/all/themes/joycone/js/markerwithlabel.js"></script>
<script type="text/javascript">

function showListTab() {
    $('#locator_results_list').show();
    $('#locator_results_map').hide();
    $("#locator_results_list_tab").addClass('active').siblings().removeClass('active');
}

function showMapTab() {
    $('#locator_results_list').hide();
    $('#locator_results_map').show();
    $("#locator_results_map_tab").addClass('active').siblings().removeClass('active');
}

google.maps.event.addDomListener(window, "load", function() {
    var map = new google.maps.Map($("#map")[0], { zoom: 12 });
    <?php if (!empty($stores)) { ?>
        map.setCenter(new google.maps.LatLng(<?php echo $zip_coords['lat']; ?>, <?php echo $zip_coords['lon']; ?>));
    <?php } ?>

    window.storeMarkers = {};
    var infoWindow = new google.maps.InfoWindow();

    window.addMarker = function(nid, lat, lng, label, iwContent) {
        var marker = new MarkerWithLabel({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            labelContent: label,
            labelAnchor: new google.maps.Point(label > 9 ? 8 : 4, 38),
            labelClass: "map_label",
            labelInBackground: false,
            icon: {
                url: "<?php echo base_path(); ?>sites/all/themes/joycone/images/map_marker.png",
                size: new google.maps.Size(46, 59),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(22, 49)
            }
        });

        google.maps.event.addListener(marker, "click", function() {
            infoWindow.setContent(iwContent);
            infoWindow.open(map, marker);
        });

        storeMarkers[nid] = marker;

        return marker;
    };

    <?php 
    if (!empty($stores)) {
		foreach ($stores as $idx => $store) {
            ?>
            addMarker(<?php echo $store->nid; ?>, <?php echo $store->field_lat[0]['value']; ?>, <?php echo $store->field_long[0]['value']; ?>, <?php echo $idx + 1; ?>, "<?php echo addslashes(str_replace(array("\r", "\n"), '', node_view($store, 1))); ?>");
            <?php 
        }
	}
    ?>

    var showMapHandler = function() {
        showMapTab();
        var marker = storeMarkers[$(this).attr("data-nid")];
        map.setCenter(marker.getPosition());
        google.maps.event.trigger(marker, "click");
    };

    $("#locator_args").submit(function(event) {
        event.preventDefault();

        var zip = $("#locator_zip").val();
        if (zip == "") {
            $("#locator_results_nozip").show();
            return;
        } else {
            $("#locator_results_nozip").hide();
        }

        var product_id = $("#locator_product_id").val();
        if (product_id == "") product_id = "any";

        infoWindow.close();
        $.each(storeMarkers, function() {
            this.setMap(null);
        });
        storeMarkers = {};
        $("#locator_results_list").empty();

        $.ajax({
            url: "<?php echo base_path(); ?>stores_by_zip/" + zip + "/" + $("#locator_radius").val() + "/" + product_id,
            type: "get",
            dataType: "json",
            success: function(data) {
                if (data.stores.length == 0) {
                    $("#locator_results_empty").show();
                    $("#locator_tabs").hide();
                } else {
                    $("#locator_results_empty").hide();
                    $("#locator_tabs").show();

                    map.setCenter(new google.maps.LatLng(data.zip_coords.lat, data.zip_coords.lon));
                    map.setZoom(12);
                    
                    $.each(data.stores, function(idx) {
                        addMarker(this.nid, this.lat, this.lon, idx + 1, this.node_view);
                        $("#locator_results_list").append(this.node_view.replace('<h3 class="rw_ultra_bold red">', '<h3 class="rw_ultra_bold red">' + (idx + 1) + ". "));
                    });

                    $(".show_map_link").click(showMapHandler);
                }
                $("#locator_loader").hide();
            }
        });
        $("#locator_loader").show();
    });

    $(".show_map_link").click(showMapHandler);

    $("#locator_products ul input[type=radio]").click(function() {
        $("#locator_product_id").val($(this).val());
        $("#locator_args").submit();
    });

    $("#locator_loader").hide();
});
</script>
<?php include 'page__footer.tpl.php'; ?>
